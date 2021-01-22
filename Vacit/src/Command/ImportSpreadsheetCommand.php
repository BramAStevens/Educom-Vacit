<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Repository\UserRepository;
use App\Entity\Poppodium;

class ImportSpreadsheetCommand extends Command
{
    private $ur;

    public function __construct(UserRepository $ur)
    {
        parent::__construct();
        $this->ur = $ur;
    }

    protected function configure()
    {
        $this->setName('app:import-spreadsheet')
            ->setDescription('Import Excel Spreadsheet')
            ->setHelp('This command allows you to import a spreadsheet')
            ->addArgument('file', InputArgument::REQUIRED, 'Spreadsheet');
    }

    protected function execute(
    InputInterface $input,
    OutputInterface $output)
    {
        $inputFileName = $input->getArgument('file');
        $spreadsheet = IOFactory::load('C:\Existentialism\Educom-Vacit\Vacit\UPLOAD_DIR\\'.$inputFileName);

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        for ($row = 2; $row <= $highestRow; $row++) {
            $params = array(
                "username" => $worksheet->getCell('A' .$row)->getValue(),
                "password" => $worksheet->getCell('B' .$row)->getValue(),
                "user_picture" => $worksheet->getCell('C' .$row)->getValue(),
                "user_surname" => $worksheet->getCell('D' .$row)->getValue(),
                "user_lastname" => $worksheet->getCell('E' .$row)->getValue(),
                "user_email" => $worksheet->getCell('F' .$row)->getValue(),
                "user_dob" => $worksheet->getCell('G' .$row)->getValue(),
                "user_phone_number" => $worksheet->getCell('H' .$row)->getValue(),
                "user_address" => $worksheet->getCell('I' .$row)->getValue(),
                "user_postcode" => $worksheet->getCell('J' .$row)->getValue(),
                "user_city" => $worksheet->getCell('K' .$row)->getValue(),
                "user_motivation" => $worksheet->getCell('L' .$row)->getValue(),
                "user_cv" => $worksheet->getCell('M' .$row)->getValue(),
                
            );
            $user= $this->ur->createUser($params);
            $output->writeln($params['username']." User imported!");
        }
        return(0);
    }
}