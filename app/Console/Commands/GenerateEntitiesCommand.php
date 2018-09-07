<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateEntitiesCommand extends \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doctrine:orm:generate-entities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '从映射信息生成实体类和方法.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this
            ->setName($this->signature)
            ->setDescription($this->description)
            ->setDefinition(array(
                new InputOption(
                    'filter',
                    null,
                    InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                    'A string pattern used to match entities that should be processed.'
                ),
                new InputArgument(
                    'dest-path',
                    InputArgument::REQUIRED,
                    'The path to generate your entity classes.'
                ),
                new InputOption(
                    'generate-annotations',
                    null,
                    InputOption::VALUE_OPTIONAL,
                    'Flag to define if generator should generate annotation metadata on entities.',
                    false
                ),
                new InputOption(
                    'generate-methods',
                    null,
                    InputOption::VALUE_OPTIONAL,
                    'Flag to define if generator should generate stub methods on entities.',
                    true
                ),
                new InputOption(
                    'regenerate-entities',
                    null,
                    InputOption::VALUE_OPTIONAL,
                    'Flag to define if generator should regenerate entity if it exists.',
                    false
                ),
                new InputOption(
                    'update-entities',
                    null,
                    InputOption::VALUE_OPTIONAL,
                    'Flag to define if generator should only update entity if it exists.',
                    true
                ),
                new InputOption(
                    'extend',
                    null,
                    InputOption::VALUE_REQUIRED,
                    'Defines a base class to be extended by generated entity classes.'
                ),
                new InputOption(
                    'num-spaces',
                    null,
                    InputOption::VALUE_REQUIRED,
                    'Defines the number of indentation spaces',
                    4
                ),
                new InputOption(
                    'no-backup',
                    null,
                    InputOption::VALUE_NONE,
                    'Flag to define if generator should avoid backuping existing entity file if it exists.'
                ),
            ))
            ->setHelp(<<<EOT
Generate entity classes and method stubs from your mapping information.

If you use the <comment>--update-entities</comment> or <comment>--regenerate-entities</comment> flags your existing
code gets overwritten. The EntityGenerator will only append new code to your
file and will not delete the old code. However this approach may still be prone
to error and we suggest you use code repositories such as GIT or SVN to make
backups of your code.

It makes sense to generate the entity code if you are using entities as Data
Access Objects only and don't put much additional logic on them. If you are
however putting much more logic on the entities you should refrain from using
the entity-generator and code your entities manually.

<error>Important:</error> Even if you specified Inheritance options in your
XML or YAML Mapping files the generator cannot generate the base and
child classes for you correctly, because it doesn't know which
class is supposed to extend which. You have to adjust the entity
code manually for inheritance to work!
EOT
            );
    }
}
