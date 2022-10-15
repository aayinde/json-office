# json-office
A Simple easy to use Json File Reader and Writer with minimal setup.


[![tests](https://github.com/aayinde/json-office/actions/workflows/php.yml/badge.svg)](https://github.com/aayinde/json-office/actions/workflows/php.yml)

# Installation

composer require aayinde/json-office

# Usage
### JsonArrayWriter
```
<?php
use Aayinde\JsonOffice\Writer\JsonArrayWriter;

$objJsonWriter = new JsonArrayWriter();
$objJsonWriter->setInput($array)
    ->saveToFile("test")
    ->saveToDirectoryPath(PUBLIC_DIR)
    ->process();
```

### Input:
```
$array = [
    'default' => [
        'config' => [
            'host' => 'localhost',
            'port' => 3306,
            'username' => "root",
            'password' => "root",
            'schema' => "test",
            'prefix' => "test",
            'socket' => null,
            'engine' => 'InnoDB',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'timezone' => '+00:00',
            'ssl' => [
                'enabled' => false,
                'verify' => true,
                'key' => null,
                'cert' => null,
                'ca' => null,
                'capath' => null,
                'cipher' => null
            ],
            'failover' => [],
            'options' => [
                MYSQLI_OPT_CONNECT_TIMEOUT => 10,
                MYSQLI_OPT_INT_AND_FLOAT_NATIVE => true,
                MYSQLI_OPT_LOCAL_INFILE => 1
            ],
            'report' => MYSQLI_REPORT_ALL & ~ MYSQLI_REPORT_INDEX
        ],
        'logger_instance' => 'default'
    ]
];
```
### Output:
### test.json
```
{
	"default": {
		"config": {
			"host": "localhost",
			"port": 3306,
			"username": "root",
			"password": "root",
			"schema": "root",
			"prefix": "test",
			"socket": null,
			"engine": "InnoDB",
			"charset": "utf8mb4",
			"collation": "utf8mb4_general_ci",
			"timezone": "+00:00",
			"ssl": {
				"enabled": false,
				"verify": true,
				"key": null,
				"cert": null,
				"ca": null,
				"capath": null,
				"cipher": null
			},
			"failover": [],
			"options": {
				"0": 10,
				"201": true,
				"8": 1
			},
			"report": 251
		},
		"logger_instance": "default"
	}
}
```
### Additional Parameters
It also support chainind methods

### Input:
```
$objJsonWriter = new JsonArrayWriter();
$objJsonWriter->setInput($array)
    ->useConvertAmpsToHexValue()
    ->useUnescapedUnitcode()
    ->useUnescapedSlashes()
    ->useUnescapedLineTerminators()
    ->useThrowException()
    ->usePreserveZeroFraction()
    ->usePartialOutputOnError()
    ->useConvertTagsToHexValue()
    ->useConvertQuoteToHexValue()
    ->useConvertNumericCheck()
    ->useConvertForceObject()
    ->useConvertAposToHexValue()
    ->useConvertAmpsToHexValue()
    ->saveToFile("test1")
    ->saveToDirectoryPath(PUBLIC_DIR)
    ->process();
```

### Output:

test1.json
```
{
	"default": {
		"config": {
			"host": "localhost",
			"port": 3306,
			"username": "root",
			"password": "root",
			"schema": "test",
			"prefix": "test",
			"socket": null,
			"engine": "InnoDB",
			"charset": "utf8mb4",
			"collation": "utf8mb4_general_ci",
			"timezone": "+00:00",
			"ssl": {
				"enabled": false,
				"verify": true,
				"key": null,
				"cert": null,
				"ca": null,
				"capath": null,
				"cipher": null
			},
			"failover": {
				
			},
			"options": {
				"0": 10,
				"201": true,
				"8": 1
			},
			"report": 251
		},
		"logger_instance": "default"
	}
}
```

### Static Instance:
```
<?php
use Aayinde\JsonOffice\JsonWriter;

JsonWriter::getInstanceJsonWriter()->setInput($array)
    ->useConvertAmpsToHexValue()
    ->useUnescapedUnitcode()
    ->useUnescapedSlashes()
    ->useUnescapedLineTerminators()
    ->useThrowException()
    ->usePreserveZeroFraction()
    ->usePartialOutputOnError()
    ->useConvertTagsToHexValue()
    ->useConvertQuoteToHexValue()
    ->useConvertNumericCheck()
    ->useConvertForceObject()
    ->useConvertAposToHexValue()
    ->useConvertAmpsToHexValue()
    ->saveToFile("test3")
    ->saveToDirectoryPath(PUBLIC_DIR)
    ->process();
```
### Output:

test3.json
```
{
	"default": {
		"config": {
			"host": "localhost",
			"port": 3306,
			"username": "root",
			"password": "root",
			"schema": "test",
			"prefix": "test",
			"socket": null,
			"engine": "InnoDB",
			"charset": "utf8mb4",
			"collation": "utf8mb4_general_ci",
			"timezone": "+00:00",
			"ssl": {
				"enabled": false,
				"verify": true,
				"key": null,
				"cert": null,
				"ca": null,
				"capath": null,
				"cipher": null
			},
			"failover": {
				
			},
			"options": {
				"0": 10,
				"201": true,
				"8": 1
			},
			"report": 251
		},
		"logger_instance": "default"
	}
}
```

# Reader Usage:
```
<?php 
use Aayinde\JsonOffice\Reader\JsonStringReader;
$objJsonReader = new JsonStringReader();
$objJsonReader->setReader($json)->process();
$objJsonReader->result();

Output:
object(stdClass)[74]
  public 'default' => 
    object(stdClass)[75]
      public 'config' => 
        object(stdClass)[78]
          public 'host' => string 'localhost' (length=9)
          public 'port' => int 3306
          public 'username' => string 'root' (length=4)
          public 'password' => string 'root' (length=4)
          public 'schema' => string 'test' (length=4)
          public 'prefix' => string 'test' (length=4)
          public 'socket' => null
          public 'engine' => string 'InnoDB' (length=6)
          public 'charset' => string 'utf8mb4' (length=7)
          public 'collation' => string 'utf8mb4_general_ci' (length=18)
          public 'timezone' => string '+00:00' (length=6)
          public 'ssl' => 
            object(stdClass)[77]
              public 'enabled' => boolean false
              public 'verify' => boolean true
              public 'key' => null
              public 'cert' => null
              public 'ca' => null
              public 'capath' => null
              public 'cipher' => null
          public 'failover' => 
            object(stdClass)[73]
          public 'options' => 
            object(stdClass)[76]
              public '0' => int 10
              public '201' => boolean true
              public '8' => int 1
          public 'report' => int 251
      public 'logger_instance' => string 'default' (length=7)

```


