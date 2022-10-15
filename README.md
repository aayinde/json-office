# json-office
A Simple easy to use Json File Reader and Writer with minimal setup.


[![tests](https://github.com/aayinde/json-office/actions/workflows/php.yml/badge.svg)](https://github.com/aayinde/json-office/actions/workflows/php.yml)

# Installation

composer require aayinde/json-office

# Usage
### JsonArrayWriter
Return to steam reader

```
<?php
use Aayinde\JsonOffice\Writer\JsonArrayWriter;

$objJsonWriter = new JsonWriter();
$objJsonWriter->getInstanceJsonWriter()
    ->setInput($array)
    ->resultOutput();
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
```
{"default":{"config":{"host":"localhost","port":3306,"username":"root","password":"root","schema":"test","prefix":"test","socket":null,"engine":"InnoDB","charset":"utf8mb4","collation":"utf8mb4_general_ci","timezone":"+00:00","ssl":{"enabled":false,"verify":true,"key":null,"cert":null,"ca":null,"capath":null,"cipher":null},"failover":[],"options":{"0":10,"201":true,"8":1},"report":251},"logger_instance":"default"}}
```

### JsonArrayWriter
Save to File.

```
<?php
use Aayinde\JsonOffice\Writer\JsonArrayWriter;

$objJsonWriter = new JsonWriter();
$objJsonWriter->getInstanceJsonWriter()
    ->setInput($array)
    ->saveToFile("test"));


```
### Output:

```
test.json
```


# Additional Parameters
#### Pretty Output

# usage

```
<?php
$objJsonWriter = new JsonWriter();
$objJsonWriter->getInstanceJsonWriter()
    ->setInput($array)->useToPrettyPrint()
    ->resultOutput();
```
### Output:

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

## Additional Methods

#### ->useToPrettyPrint()
#### ->useConvertAmpsToHexValue()
#### ->useConvertAposToHexValue()
#### ->useConvertForceObject()
#### ->useConvertNumericCheck()
#### ->useConvertQuoteToHexValue()
#### ->useConvertTagsToHexValue()
#### ->usePreserveZeroFraction()
#### ->usePartialOutputOnError()
#### ->useUnescapedLineTerminators()
#### ->useUnescapedSlashes()
#### ->useUnescapedUnitcode()



# JsonReader


#### JsonFileReader
Read a Json file

```
<?php
use Aayinde\JsonOffice\JsonReader;

$objJsonReader = new JsonReader();
$objJsonReader->getInstanceJsonFileReader()
    ->setReader("test.json")
    ->result();
```
### Output

```
object(stdClass)[75]
  public 'default' => 
    object(stdClass)[76]
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
            array (size=0)
              empty
          public 'options' => 
            object(stdClass)[74]
              public '0' => int 10
              public '201' => boolean true
              public '8' => int 1
          public 'report' => int 251
      public 'logger_instance' => string 'default' (length=7)
```



#### JsonStringReader
Read a Json String

### Usage

```
<?php
use Aayinde\JsonOffice\JsonReader;
$objJsonReader = new JsonReader();
$objJsonReader->getInstanceJsonStringReader()
    ->setReader($readerInput)
    ->result();
```

### Input

```
{"default":{"config":{"host":"localhost","port":3306,"username":"root","password":"root","schema":"test","prefix":"test","socket":null,"engine":"InnoDB","charset":"utf8mb4","collation":"utf8mb4_general_ci","timezone":"+00:00","ssl":{"enabled":false,"verify":true,"key":null,"cert":null,"ca":null,"capath":null,"cipher":null},"failover":[],"options":{"0":10,"201":true,"8":1},"report":251},"logger_instance":"default"}}
```

### Output

```
object(stdClass)[75]
  public 'default' => 
    object(stdClass)[76]
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
            array (size=0)
              empty
          public 'options' => 
            object(stdClass)[74]
              public '0' => int 10
              public '201' => boolean true
              public '8' => int 1
          public 'report' => int 251
      public 'logger_instance' => string 'default' (length=7)
      
```

## Additional Methods

#### ->useObjectAsArray()
#### ->useBigIntAsString()
#### ->useIgnoreInvalidUtf8()
#### ->useInvalidUtf8Substitute()


