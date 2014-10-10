require 'nokogiri'
require 'open-uri'
require 'json'

class Feed

	def initialize(name, url)
	  @feed_name=name
	  @feed_url=url
	end
	
	# Returns the name of the current feed
	def name
		name = @feed_name
	end
	
	# Gets all jobs, parsed and standardized formats for any feed
	def jobs
		if(@feed_name == "govt")
			data = Nokogiri::HTML(open(@feed_url))
		else
			data = Nokogiri::XML(open(@feed_url))
		end
		jobListings = Array.new
		
		# Parse Indeed listings
		if(@feed_name == "indeed") 
			jobs = data.css('result')
			jobs.each do |job|
				title = job.css('jobtitle').text
				company = job.css('company').text
				link = job.css('url').text
				city = job.css('city').text
				state = job.css('state').text
				date = Date.parse job.css('date').text
				description = job.css('snippet').text
				description = description.slice(0,1).capitalize + description.slice(1..-1)
				jobListings << [title, company, date, description, link, @feed_name, city, state]
			end
			
		# Parse CareerBuilder listings
		elsif(@feed_name == "cb")
			jobs = data.css('JobSearchResult')
			jobs.each do |job|
				title = job.css('JobTitle').text
				company = job.css('Company').text
				link = job.css('JobDetailsURL').text
				cityState = job.css('Location').text.split(" - ")
				city = cityState[1]
				state = cityState[0]
				date = Date.strptime( job.css('PostedDate').text, "%m/%d/%Y" )
				description = job.css('DescriptionTeaser').text
				description = description.slice(0,1).capitalize + description.slice(1..-1)
				jobListings << [title, company, date, description, link, @feed_name, city, state]
			end
		
		# Parse SimplyHired
		elsif(@feed_name == "sh")
			jobs = data.css('r')
			jobs.each do |job|
				title = job.css('jt').text
				company = job.css('src').text
				link = job.css('src').attr('url')
				cityState = job.css('loc').text.split(", ")
				city = cityState[0]
				state = cityState[1]
				date = job.css('ls').text.split('T')[0]
				description = job.css('e').text
				description = description.slice(0,1).capitalize + description.slice(1..-1)
				jobListings << [title, company, date, description, link, @feed_name, city, state]
			end
		
		# Parse Dice
		elsif(@feed_name == "dice")
			jobs = data.css('resultItem')
			jobs.each do |job|
				title = job.css('jobTitle').text
				company = job.css('company').text
				link = job.css('detailUrl').text
				cityState = job.css('location').text.split(", ")
				city = cityState[0]
				state = cityState[1]
				date = job.css('date').text
#				# Add description takes too long. Will need to do this later
# 				listing = Nokogiri::XML(open(link))
# 				description = listing.css('div.dc_content p')[0]
# 				if(description)
# 					puts description
# 				end
				description = company+" is hiring a "+title+". Find out more about this position by clicking the link below."
				jobListings << [title, company, date, description, link, @feed_name, city, state]
			end
		
		# Parse Government Jobs
		elsif(@feed_name == "govt")
			jobs = data.css("p")[0].text
			jobs = JSON.parse(jobs)
			jobs.each do |job|
				title = job['position_title']
				company = job['organization_name']
				link = job['url']
				cityState = job['locations'][0].split(", ")
				city = cityState[0]
				state = cityState[1]
				date = job['start_date']
				description = company+" is hiring a "+title
				if(job['maximum'])
					description << " who could make up to $"+job['maximum'].to_s.split('.')[0]
				end
				description << ". Find out more about this position by clicking the link below."
				jobListings << [title, company, date, description, link, @feed_name, city, state]
			end
		else
			rec = "Another Job"
		end
		jobListings
	end
	
end