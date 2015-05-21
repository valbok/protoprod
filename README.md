# Prototype of product feed - protoprod

Handles very large XML-feeds without putting too much pressure on either the CPU or the memory. Because of that feeds can no longer be put into memory, but have to be processed in an alternative way.

Consists of two parts.

* Part 1: the interface

Small interface that will allow the user to submit a URL of a product feed. On submit, the URL should be processed (more on the processing function in part 2 of this assessment), and the results of that processing should be shown to the user.

If JavaScript is enabled, additionally, the above process should work without reloading the page using
XMLHTTP (either using get or post).
Used custom made small MVC framework to fit the interface into.

* Part 2: processing the feed URL
The feed processing function should be able to handle very large feeds of a fixed format.

The feed is a few hundred megabytes large and contains thousands of products. 
fetch the given URL
1. Goes through each of the products and create a separate file for each product, containing the information on that product in the specific format.
2. Dumps that file into a pre-defined directory
3. Returns whether it was successful, and how many products it processed, or if not successful, what the error was.

* Restrictions

No specific PHP extension used, everything is custom made.
No database is used;
No (PHP, JavaScript) frameworks are used;
Any PHP used should be E_STRICT compliant and limited to 32MB of memory.

* Result

The basis of the example is a Product class that implements iProduct interface, which is supposed to be used to decrease dependencies in case if the solution will be used by external users.

The products should be stored by request. For this purpose created Storage class that defines how it should be stored. Storage class agregates and encapsulates specific storage class (storage\Filesystem) that implements iStorage interface. This allows to switch to another storage system without additional work which leads decreasing dependencies on extending or modification of the system. Also this storage class can say how to fetch data and which resources.

And the main part of the system is Parser which is responsible to work with large feed. Means no able to load objects to memory.

Additionally Template engine has been introduced which used by Module-View-Presenter (MVP) solution.
Controller defines the point of the entry.
Model contains knowledge about products and storages.
Views consist of templates, js and html.

Also unit testing has been provided.