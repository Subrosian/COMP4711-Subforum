<div class="forum">
    <h2>{heading}</h2>
    <p><pre>This webapp is created by Abel Jacob Lim, from set 4O.

This webapp is a personalized message board. I intend to incorporate this message board into my own website, doubling as an artifact.

The message board will include:
    -3 separate "forums" accessible by the navigation bar.  One of the forums would be an "Announcements" forum
     (Actually, each of these "forums" would actually be 'topics' according to how most message boards work, ie. all of the posts on each of these "forums" would be in plain view upon clicking to enter each forum.)
    -registration of users, but very basic settings - with the ability to set an avatar, and the layout of the site (without even a separate "User settings" page, but instead these options would be immediately available on any given page)

The sitemap will include:
    -navigation bar between 3 different forums, and an about page
    -The "subject" fields of the 5 most recent posts (that would link to the actual forum posts)
    -announcements (which would display the beginning of the 2 most recently created announcements in a separately created Announcement forum)
    -number of registered users, list of users online

These are the intended usecases for this forum:
    1. Search for forum post (by user, or post content)
            -Sort forum posts by date, ascending or descending, and alphabetically
    2. Set layout of the current forum and its posts,  
            -selecting between 3 different layouts, via a drop-down menu that can select between layouts of the forum.
            -layout would be saved for a registered user. (In assignment 1, I would have a person considered logged in as a "Guest" by default.)
    3. Create/edit post on forum
            -has username and timestamp in addition to post
            -Could also post anonymously, or under any name, if not registered
    4. Register an account
            -Can set an avatar for the given account, but that's it.

About Assignment 1:
As of now, the layout designs have not been implemented. I focused on getting the coding done before
implementing the layout and incorporating images, CSS files, and scripts under the assets.
Assets for this webapp, such as images (including a custom logo), and scripts, are not yet implemented, however; these are to
be incorporated by the next assignment.
CSS is yet to be implemented; note that the CSS is planned to be what will organize the positions of the various items in the layouts of the site in order to match the wireframes designed for this webapp. So as of now, pretty much everything is just laid down from top to bottom, the layouts not yet matching the intended design as of this assignment.
Also to be done for the next assignment include:
    -the use of a drop-down to select between layouts
    -a more customized template
    -logic to generate the content of the homepage

What could be done better:
This assignment was based off of our Lab 3, due to convenience. Unfortunately as of now, not much has yet been done
to customize the layout of this website, and so what I have is based on the Lab 3.
As of now, I have not incorporated any new graphics, nor CSS, into my layouts.

There are some redundant lines in the controllers, which I could resolve through creating a parent controller
as I continue working on this webapp.

About assignment 2:
Things to be done:
    -Make posts nested.
Note that the widgets at the bottom-right are currently not functional.
-The controllers currently have a lot of redundancy, as I have had issues with inheriting a parent controller.
I have an issue where it says that the parent controller is not found. It seems like others have also had this
issue with CodeIgniter, from what I've seen on stackoverflow.com.
Alternatively, I could make one controller manage all of the separate forums to avoid this redundancy.
    </pre></p>
</div>