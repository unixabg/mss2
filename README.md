###### Copyright (C) 2015 John Burd jburd@silverburd.com
###### This program comes with ABSOLUTELY NO WARRANTY; for details see COPYING.
###### This is free software, and you are welcome to redistribute it
###### under certain conditions; see COPYING for details.

## My Simple Site 2
My Simple Site 2 is an open source website template.

## Installation
```
git clone https://github.com/johnburd/mss2
```
## Getting started
The default username is "admin" and the password is "test".  
You may have to change the file owner of "./pages"  
Example:
```
chown www-data:www-data pages
```
## Modular Design
MSS2 is designed to be modular in page design. You can create new page designs by creating a directory in "./pages"
The name of the directory should be the style you are creating, for example "./pages/text" is for a text styled page.
The instructions below should supply you with the information to get you started on your own page design.
+ Create a directory with the name of your style and place it in "./pages". This creates a directory to store pages with this design.
+ Create an icon for the style you created and place it in "./pages/yourStyle" with the name "icon.png". This icon will appear on the "Manage Pages" tab on the administrative interface.
+ Make an "edit.php" file place it in "./pages/yourStyle". This will serve as the page when editing your page style.
+ You will also need to create a "display.php" file placed in "./pages/yourStyle". This file will be the layout that the public will see when viewing your site.
