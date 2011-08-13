host = ARGV[0] ||= "localhost"
email = ARGV[1] ||= "email=readachunk@kjer.info"

puts "host: #{host}"
puts "email: #{email}"

`rm ../uploads/*.pdf`
`rm ../temp/*.pdf`
`rm ../db.json`
`touch ../db.json`

puts `curl -F "book=@20-pages.pdf;type=application/pdf" -F "email=#{email}" -F "pages=5" -F "frequency=1" http://#{host}/upload.php`

4.times do |i|
  puts "scheduller: #{i}"
  puts `curl http://#{host}/scheduler.php`
  sleep(1)
end  
