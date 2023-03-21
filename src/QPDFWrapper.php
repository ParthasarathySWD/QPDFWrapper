<?php

require_once 'vendor/autoload.php';

use mikehaertl\shellcommand\Command;

/**
 * QPDF wrapper for PHP
 */
class QPDFWrapper
{
    private $qpdfPath;

    /**
     * Constructor
     *
     * @param string $qpdfPath Path to qpdf binary
     */
    public function __construct($qpdfPath = '/usr/bin/qpdf')
    {
        $this->qpdfPath = $qpdfPath;
    }

    /**
     * Encrypts a PDF file with given password
     *
     * @param string $inputFile Path to input PDF file
     * @param string $outputFile Path to output encrypted PDF file
     * @param string $userPassword User password for the PDF
     * @param string $ownerPassword Owner password for the PDF
     */
    public function encrypt($inputFile, $outputFile, $userPassword, $ownerPassword)
    {
        $command = new Command(sprintf('%s --encrypt %s %s 128 -- %s %s', $this->qpdfPath, $userPassword, $ownerPassword, $inputFile, $outputFile));
        $command->execute();
    }

    /**
     * Decrypts a PDF file with given password
     *
     * @param string $inputFile Path to input encrypted PDF file
     * @param string $outputFile Path to output decrypted PDF file
     * @param string $password Password for the PDF
     */
    public function decrypt($inputFile, $outputFile, $password)
    {
        $command = new Command(sprintf('%s --decrypt --password=%s -- %s %s', $this->qpdfPath, $password, $inputFile, $outputFile));
        $command->execute();
    }

    /**
     * Linearizes a PDF file for fast web view
     *
     * @param string $inputFile Path to input PDF file
     * @param string $outputFile Path to output linearized PDF file
     */
    public function linearize($inputFile, $outputFile)
    {
        $command = new Command(sprintf('%s --linearize %s %s', $this->qpdfPath, $inputFile, $outputFile));
        $command->execute();
    }

    /**
     * Optimizes images in a PDF file for reduced file size
     *
     * @param string $inputFile Path to input PDF file
     * @param string $outputFile Path to output optimized PDF file
     */
    public function optimizeImages($inputFile, $outputFile)
    {
        $command = new Command(sprintf('%s --optimize-images %s %s', $this->qpdfPath, $inputFile, $outputFile));
        $command->execute();
    }
}
