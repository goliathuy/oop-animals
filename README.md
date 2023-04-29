# OOP Animals

## Motivation

This is part of a recruiting process, where the requirement was to complete this simple coding assignment.  
The expectation is that this should not require more than a few hours to complete.  

## Prerequisites
  
You must have the following installed:  
  
 - [PHP 5.6](https://prototype.php.net/versions/5.6/install/)  
 - [Composer 2](https://getcomposer.org/doc/00-intro.md)  
 - Optionaly  
    - [Git](https://github.com/git-guides/install-git) is not required but is recommended, the link refers to github instructions on its installation.  

## Installation

Please follow the next steps:  
  
1. Download the source code from the [repository](https://github.com/goliathuy/oop-animals) in a folder, by default it would be oop-animals, let's call it project folder.  
   Using this file as a reference, it must be located directly in the after mentioned folder.  
     1. If you have Git you can clone it.  
     1. Else you can download a zip version, and expand its content in the desired folder.  
1. Once in the project  folder, run the command `composer install`.  
1. Run the script and verify you see the help details `php script.php --help`.  
# Requirements

I choosed PHP as was preferred and I'm used to.
The requirement was to create a command line application that accept a name and an animal type.
On receiving the input, the application should respond with an appropriate message from that animal.

For example,

    # php AnimalProject.php "Mr Pickles" cat

    Mr Pickles says "meow"

The application must use object inheritance for its implementation
The application should support at least the following animals
cat (output: <name> says "meow")
dog (output: <name> says "woof")
cow (output: <name> says "moo")
unicorn (output: Unicorns are not real)
The application should not fail when an unknown animal name is received
Unit tests should be included

Please also provide instructions on how to build, install and run as appropriate.

Optionally, feel free to add enhancements.  Some ideas:

Ability to support new animal types without changing existing code (plug & play animals)
Ability to persist and reload animals offline (database, file, etc.)
Ability to create multiple animals at once
Support for additional attributes for animals (age, height, favorite food, etc.)
Anything else that showcases your talents