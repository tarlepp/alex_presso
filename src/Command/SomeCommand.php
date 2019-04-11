<?php

namespace App\Command;

use App\Repository\FooRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SomeCommand extends Command
{
    protected static $defaultName = 'app:some-command';

    private $repository;

    public function __construct(FooRepository $repository)
    {
        parent::__construct(self::$defaultName);

        $this->repository = $repository;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->success($this->repository->someRepositoryMethod());
    }
}
