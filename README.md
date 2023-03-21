Sure! Here's a sample `README.md` file in Markdown format:

QPDF Wrapper
============

QPDF Wrapper is a PHP package that provides a simple and convenient way to use the [QPDF command-line tool](http://qpdf.sourceforge.net/) to perform various operations on PDF files, such as encryption, decryption, linearization, and optimization.

Installation
------------

You can install QPDF Wrapper using [Composer](https://getcomposer.org/). Simply run the following command in your terminal:

bashCopy code

`composer require yourname/qpdf-wrapper`

Usage
-----

First, you need to create a new instance of the `QPDFWrapper` class, passing in the path to the QPDF binary on your system:

phpCopy code

`use QPDFWrapper\QPDFWrapper;  $qpdf = new QPDFWrapper('/usr/local/bin/qpdf');`

### Encrypt a PDF file

To encrypt a PDF file with a user password and an owner password, use the `encrypt` method:

phpCopy code

`$qpdf->encrypt('input.pdf', 'output.pdf', 'user_password', 'owner_password');`

### Decrypt a PDF file

To decrypt a PDF file with a password, use the `decrypt` method:

phpCopy code

`$qpdf->decrypt('encrypted.pdf', 'decrypted.pdf', 'password');`

### Linearize a PDF file

To linearize a PDF file for fast web view, use the `linearize` method:

phpCopy code

`$qpdf->linearize('input.pdf', 'output.pdf');`

### Optimize a PDF file

To optimize a PDF file for reduced file size, use the `optimize` method:

phpCopy code

`$qpdf->optimize('input.pdf', 'output.pdf');`

### Exception Handling

All methods may throw `QPDFWrapper\Exception\QPDFWrapperException` if any errors occur. You can catch the exception and handle it appropriately.

phpCopy code

`use QPDFWrapper\Exception\QPDFWrapperException;  try {     $qpdf->encrypt('input.pdf', 'output.pdf', 'user_password', 'owner_password'); } catch (QPDFWrapperException $e) {     // Handle the exception }`

License
-------

QPDF Wrapper is licensed under the [MIT License](https://opensource.org/licenses/MIT). See the `LICENSE` file for details.