## P3 Peer Review

+ Reviewer's name: Victoria Royal
+ Reviewee's name: Christopher Sheppard
+ URL to Reviewee's P3 Github Repo URL: <https://github.com/chs9433/project-3>

## 1. Interface

My initial impression was that the site interface was overall very professional, with a clean and streamlined design.
 
I especially liked how the results displayed in a table with the map display, which I thought was very practical. Also, I liked the placement of the input fields, which allowed all of the fields to viewed without having to scroll down, and the clear labeling for each field. I also liked the small finishing details such as the AutoPilot icon and search icon.

I also appreciated the default values in each field, although I did find it slightly confusing that there seemed to be no difference in font color between the default values and the entered values.  

My suggestion would be to make sure that the font color is different for the entered values, so as to avoid any confusion for users. On a smaller note, I would also suggest using the AutoPilot icon as a favicon.

## 2. Functional testing

I tried to submit the form without any data, and noticed error messages appeared for all of the required fields except for the Vehicle Service Station field. There seems to be a validation issue with this field, although I am not sure what may be causing it.

When I tried to submit the form with some of the data, I noticed that all of the fields retained the entered value except for the Vehicle Service Station field (which would go back to the default value). Additionally, when I tried to submit the form with all of the fields except for the Vehicle Service Station, the form submitted without an error message and there were no search results. This seems to be the same validation issue. 

All of the fields seem to only be accept the appropriate values (alphanumeric for the street address, five digits for the zipcode, and a number between 1 and 10 for the search radius).

When I went to a URL that does exist (http://p3.sheppify.me/asdjfks), I received a 404 Not Found page as expected. 


## 3. Code: Routes

There does not seem to be any code in the Routes file that should be the Controller. 


## 4. Code: Views

It seems that template inheritance is being used. There does not seem to be any non-display specific logic in the view file. I did not notice any php used instead of Blade. Also, the Blade syntax seemed to be the same as we have learned in class.


## 5. Code: General

I did not see any inconsistencies between the code and the class notes. I did note that some of the lines of code were very long, so that I had to scroll to the right to view the full line in Github. For the purposes of reading the code, it might have helpful to limit the line length. 

Additionally, it would helpful for a less experienced programmer like myself if more comments could be included, especially for the results section in index.blade.php since it is more involved.

I did not understand the use of POST rather than GET, and I would be interested in learning why that option was chosen. Is this building a database of some kind? I would also be interested in learning how the vehicle service station data is displayed and how it appears on the map.

## 6. Misc
The site was a great example of what a more experienced programmer could do and I greatly appreciated the opportunity to review it.  