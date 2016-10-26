#User

id = ___HIDDEN
//[INT;usr_id;required|number]

name* = ___INPUT
//[VARCHAR;usr_name;required|max_len,80|min_len,4]

familyname = ___INPUT
//[VARCHAR;usr_familyname;max_len,80|min_len,4]

###### Radio buttons
gender = ___RADIO
//[VARCHAR;usr_gender;max_len,80|min_len,2]
//{+male=male;female=female}

###### Checkboxes
phones = ___CHECKBOX
//[INT;usr_phones;numeric]
//{+Android=1;iPhone=2;Blackberry=3}

###### Drop down
city = ___DROPDOWN 
//[INT;usr_city;numeric]
//{Android=1;+iPhone=2;Blackberry=3}

###### Required fields
zip code* = ___INPUT 
//[VARCHAR;usr_zipcode;required|max_len,80|min_len,4]
