<?php

use Frankie\Core\Provider\DataParserProvider;
use Frankie\Request\Parser\JSONParser;
use Frankie\Request\Parser\MultiFormParser;
use Frankie\Request\Parser\XMLParser;

$dataParserProvider = new DataParserProvider();
$dataParserProvider->add('application/json', JSONParser::class);
$dataParserProvider->add('application/xml', XMLParser::class);
$dataParserProvider->add('multipart/form-data', MultiFormParser::class);

return $dataParserProvider;