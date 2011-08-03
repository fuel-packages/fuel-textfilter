# Fuel Text-Filter package

The Text-Filter package was created as a way to easily alter Response output before it was sent to the user. Since then it has made more sense to not limit it to that specific use. This package is simply a collection of filters meant to process and alter a text string. 

## Development Team

* Frank Bardon Jr. - Lead Developer ([http://nerdsrescue.me] (http://nerdsrescue.me))


## Installation

This package follows standard installation rules, which can be found within the [FuelPHP Documentation for Packages] (http://fuelphp.com/docs/general/packages.html)

To install via the oil package command, first ninjarite's github to the package config.

```
// fuel/app/config/package.php
return array(
	'sources' => array(
		'github.com/fuel-packages',
		'github.com/ninjarite', // ADD THIS LINE
	),
),
```

Then run the following command from your shell while in your applications' base directory

```
oil package install textfilter
```

## Usage

### Running a Single Text Filter

To run just one single filter, simply do the following. You will find the list of filters included with this package below. And for more configuration options on each filter, see the filters' corresponding config file.

```
$string = "string to parse";
$config = array('config' => 'options');

$output = new Filter('filtername', $config);
```

### Running Multiple Filters

#### Most basic, succinct usage.

```
$string = "String to parse";

// Process all filters at once.
$output = FilterSet::factory('group', array('acronym', 'censor', 'stripper')->process_all($string);

// Process one filter from the set.
$output = FilterSet::factory('group', array('acronym', 'censor', 'stripper')->process('stripper', $string);
```

If you only plan on having one Filter Set instance you can simply call _FilterSet::factory()_ with no attributes.

#### Slightly more advanced usage.

```
$filterset = FilterSet::factory('mygroup');

$filterset->append('stripper'); // Add the filter to the end of the filters array
$filterset->prepend('acronym'); // Add the filter to the beginning of the array.
```

_Sometimes you may wish to organize the filters you would like to run in a certain order... For instance, if a certain filter processes your HTML and replaces it with entities, then you will need to run the HTML replacement filters before it..._


### Resetting a Filter Set

```
$filterset = FilterSet::factory('mygroup', array('stripper', 'acronym');
$output = $filterset->process_all("My input string");

// This will clear all loaded filters and 
// leave you with an empty filterset.
FilterSet::instance('mygroup')->reset();
```

## Included Filters

* **Acronym** - Automatically replace all instances of acronyms on your site with <abbr> tags and title.
* **BBCode** _unfinished_ - Convert BBCode markup into HTML.
* **Censor** - Remove bad language, or any language you configure it to remove.
* **Highlight** - Automatically wrap words you wish to "highlight" with HTML of your choosing (good for highlighting search terms).
* **HTML Purifier** _unfinished_ - Utilize the HTML Purifier library via the TextFilter interface.
* **Markdown** - Convert Markdown markup into HTML.
* **Smileys** _unfinished_ - Convert :) emoticons into image tags.
* **Stripper** - Automatically remove non-whitelisted HTML markup.
* **Textile** _unfinished_ - Convert Textile markup into HTML.
* **Truncate** - Limit the number of words to be displayed from your text, and optionally add HTML to the end of it.
