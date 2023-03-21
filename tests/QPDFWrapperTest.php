<?php

use PHPUnit\Framework\TestCase;
use QPDFWrapper\QPDFWrapper;

class QPDFWrapperTest extends TestCase {
  
  private $inputFile;
  private $encryptedFile;
  private $decryptedFile;
  private $compressedFile;
  private $decompressedFile;
  private $linearizedFile;
  private $password;
  
  protected function setUp(): void {
    $this->inputFile = "tests/input.pdf";
    $this->encryptedFile = "tests/output-encrypted.pdf";
    $this->decryptedFile = "tests/output-decrypted.pdf";
    $this->compressedFile = "tests/output-compressed.pdf";
    $this->decompressedFile = "tests/output-decompressed.pdf";
    $this->linearizedFile = "tests/output-linearized.pdf";
    $this->password = "testpassword";
  }
  
  public function testEncrypt() {
    $qpdf = new QPDFWrapper();
    $qpdf->encrypt($this->inputFile, $this->encryptedFile, $this->password);
    $this->assertFileExists($this->encryptedFile);
  }
  
  public function testDecrypt() {
    $qpdf = new QPDFWrapper();
    $qpdf->decrypt($this->encryptedFile, $this->decryptedFile, $this->password);
    $this->assertFileExists($this->decryptedFile);
  }
  
  public function testCompress() {
    $qpdf = new QPDFWrapper();
    $qpdf->compress($this->inputFile, $this->compressedFile);
    $this->assertFileExists($this->compressedFile);
  }
  
  public function testDecompress() {
    $qpdf = new QPDFWrapper();
    $qpdf->decompress($this->compressedFile, $this->decompressedFile);
    $this->assertFileExists($this->decompressedFile);
  }
  
  public function testLinearize() {
    $qpdf = new QPDFWrapper();
    $qpdf->linearize($this->inputFile, $this->linearizedFile);
    $this->assertFileExists($this->linearizedFile);
  }
  
}
