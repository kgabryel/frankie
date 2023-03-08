<?php

use App\Rules\ExistsRule;
use App\Rules\UniqueRule;
use Frankie\Core\Provider\RulesProvider;

$rulesProvider = new RulesProvider();

$rulesProvider->add('unique', UniqueRule::class);
$rulesProvider->add('exists', ExistsRule::class);

return $rulesProvider;