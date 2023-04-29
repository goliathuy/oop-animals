# OOP Animals

## Motivation

Simple coding assignment, expected only to require a few hours to complete.  

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
1. Run the script and verify you see usage and help details `php script.php --help`.  
## Usage

    php .\script.php [options] | <animal_name> <animal_type>

### Positional parameters

Specify name and type of the animal in that order directly

    php script.php boby dog

### Options

  `-h`, `--help` Display the help message  
  `-n`, `--name` Animal name  
  `-t`, `--type` Animal type  

### Multiple animals    

Both long or short options allow to send multiple animals, see here an example using the long format:

    php script.php --name=boby --type=dog --name=lucy --type=cow

### Additional animals

To include new animals, please refer to `src/Domain` folder and use one of the animals you can find there.

Unicorn is an example of an unreal animal and as such it would not say anything, Cat, Cow and Dog are real animals with the ability to emit their sound.

## Testing

To run unit tests run the following code

    vendor/bin/phpunit tests

## Known Issues

- At this time the application is may be affected by how the operating system handles capital letters, refrain from using multiple words for the animal type. 
- The application is not sanitizing any input and as such is susceptible to code injection.

