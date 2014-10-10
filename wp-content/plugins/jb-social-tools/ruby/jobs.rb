require 'rubygems'
#require 'extensions/all'
require 'mysql'
require_relative 'jb-feeds'
require 'yaml'

class Job
    def initialize(sites)
        @allJobs = Array.new
        sites.each do |site|
            site.jobs.each do |job|
                @allJobs << jobClean(job)
            end
        end
        dbconfig = YAML.load_file("Sites/jb/wp-content/plugins/jb-social-tools/ruby/conf.yml")["development"]
        @con = Mysql.new( dbconfig['hostname'], dbconfig['username'], dbconfig['password'], dbconfig['database'])
        puts @allJobs.count
    end
    # Sanitize inputs
    def jobClean(job)
        @@cleanJob = Array.new
        job.each do |value|
            if(value.is_a? String)
                @@cleanJob << Mysql.escape_string(value)
            else
                @@cleanJob << Mysql.escape_string(value.to_s)
            end
        end
        @@cleanJob
    end
    def addJobs(jobs = @allJobs)
        @@saved = Array.new
        jobs.each do |job|
            unless checkJob(job)
                @@queryString = job.join('","')
                @@query = 'INSERT INTO jobs VALUES(NULL,"%{string}",0)' % {string: @@queryString}
                @@saved << @con.query(@@query)
            end
        end
        puts @@saved.count
    end
    def checkJob(job)
        # Checks to see if the job is already in the database
        @@query = 'SELECT id FROM jobs WHERE title LIKE "%{title}" AND company LIKE "%{company}"' % {title: job[0], company: job[1]}
        jobCheck,=@con.query(@@query).fetch_row
    end
    def closeDbConnection
        @con.close if @con
    end
end

sites = Array.new
sites << Feed.new("indeed", "http://api.indeed.com/ads/apisearch?publisher=3806336598146294&q=entry+level&v=2")
sites << Feed.new("cb", "http://api.careerbuilder.com/v2/jobsearch/?DeveloperKey=WDHL7J45VXXWCFNDTN71&HostSite=US&Keywords=entry+level")
sites << Feed.new("sh", "http://api.simplyhired.com/a/jobs-api/xml-v2/q-entry+level?pshid=48234&ssty=2&cflg=r&jbd=jobbrander.jobamatic.com&clip=98.220.14.19")
sites << Feed.new("dice", "http://service.dice.com/api/rest/jobsearch/v1/simple.xml?text=entry+level")
sites << Feed.new("govt", "http://api.usa.gov/jobs/search.json?query=entry+level")

jobs = Job.new(sites)
addedJobs = jobs.addJobs
jobs.closeDbConnection


