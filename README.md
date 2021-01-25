<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/github.jpg?token=AONYJJ7NHFMT6VVECCOO4NDAB2ZOW">
As a part of my education at Educom, I have created a Vacancy-website called Vac!t as a case study. I have used Symfony and PHP to generate a site where Candidates can register, update their profile and apply to numerous technology related jobs. Employers can post jobs on Vac!t and receive an overview of all applicants per job, which they can invite for an interview with a simple click.

All in all, I am proud to present to you the result of my work!

## Technologies used

* **HTML & CSS**
* **Javascript/Json**
* **Foundation**
* **Symfony**
* **AJAX**
* **SimpleUpload Library**
* **PHP**
* **Vegas.JS**
* **PhpMyAdmin**
* **Sweet Alert**
* **Twig**


I found it especially fun working with all the listed technologies but I feel that some deserve honorable mentions:

* I enjoyed implementing AJAX to show pictures on the screen as they are uploaded by users.
* I had a lot of fun creating different permissions for different logged in users (Candidate, Employer, Admin) and showing different pages or buttons based on who is logged in.
* I enjoyed error handling or handling pages with insufficient access privilege with the use of Sweet Alert.
* I enjoyed using Vegas.JS to loop through all of my vacancies and their icons to show them on my home page.

## Methods & Techniques

### Planning & Github Projects

Before any lines of code were written, I made a point of it to ensure that my organization and planning were on par to streamline my workflow. To do so, I first mapped out all of my functions from Controller to Entity and put all of these functions in a Github Project. This ensured that I could focus entirely on one function at a time and give myself deadlines. I am confident that this increased my productivity significantly and am continuously aiming to improve the process and do it better every time.

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/Planning.png?token=AONYJJ5YTSXODHIZDS4WTLTAB2ZLM">

Furthermore, I created an entity relation diagram to ensure my database was logically structured and that all fields were incorporated:

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/database.jpg?token=AONYJJ75VRX7CRD6LVZ4PWTAB2ZNM">

### Responsive Layout

Due to the prevalence of mobile sites and with the use of Foundation, I took a 'Mobile-first' approach to creating Vac!t. Each page can be viewed on a mobile phone and on a desktop. In some cases, some elements are shown on Desktop that I chose to leave out on mobile; this was done to ensure that each page looks sleek and pleasing to the eye. Furthermore, on mobile I added a dropdown 'hamburger' menu to further enhance the mobile experience. This was a very interesting experience because (among other things) it taught me how to use the CSS @media Rule to show different CSS elements on different screen sizes and to be extra attentive to every single Div in my front-end.

### Stylesheet

In Vac!t I have used a mandatory stylesheet as can be seen below. All elements of the site were created strictly in accordance to this styleshet:

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/styleSheet.jpg?token=AONYJJ634APT3G2QCH63FLTAB2ZVI">

### Permissions & Security

In Vac!t there are 3 roles each with different permissions (different buttons are visible and different pages are accessible):

* **Admin** Has access to all pages, can update/delete all jobs and can update all user (candidate and employer) profiles. 

* **Employer** Can create jobs, update jobs, view all candidates per jobs, view candidate profiles and view a list of all their own jobs.

* **Candidate** Can view their profile, update their profile, apply to jobs, view all jobs and view individual jobs.

* **Users whom are not logged-in** Can view the homepage, view a list of all jobs, register and log in.

### Import Spreadsheet

For Vac!t, candidates can register by means of the 'Register' page; However, for employers to be registered, their user details are input into an excel sheet and imported by use of a symfony bin/console command. Once imported, they receive the role Employer and a default password.

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/Import.JPG?token=AONYJJ474XL3HLWIWBZZOVLAB2ZI6">

## UX Design / Prototype

Please refer to below section for an overview of the pages of Vac!t (please note that some pages have been left out to avoid redundancy).

### Homepage

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/homepage.JPG?token=AONYJJ5O55GMK5CSHJSAZYLAB2ZPK">

The homepage shows the 5 most recent vacancies and has a link to all vacancies with a vegas slideshow that loops through all the images and names of the current vacancies.

### Login (Candidate)

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/logIn.jpg?token=AONYJJ5ZWUMOUVQ7XLA2HM3AB2ZSM">

### Current Vacancies

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/allJobs.JPG?token=AONYJJ2GDH5ZCCC74TMYMB3AB2ZMI"> 

### Vacancy

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/Job.jpg?token=AONYJJ2TJE4GRV7JFX53FFTAB2ZKE"> 

### My applications (Candidate)

<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/myApplications.jpg?token=AONYJJZUSSVH65KS3O66DDDAB2ZTC">  

### My Jobs (Employer)
<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/myJobs.jpg?token=AONYJJZJLSKER5FTYHOBR7LAB2ZTY">

### My Profile
<img src="https://raw.githubusercontent.com/BramAStevens/Educom-Vacit/master/Vacit/public/assets/githubImages/myProfile.jpg?token=AONYJJ5DQ4F7KUCMUQNZVQDAB2ZUU">

Thank you for viewing my ReadMe of Vac!t. I hope you enjoyed reading it as much as I enjoyed coding it!
