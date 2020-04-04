# Hello MexicanLoremIpsumBundle!
MexicanLoremIpsumBundle is a way for you to generate "fake text" into
your Symfony application. Instead of the traditional LoremIpsum you will get the best mexican slang
words for you application.
Install the package with:
```console
composer require saam/mexican-lorem-ipsum-bundle --dev
```
And... that's it! If you're *not* using Symfony Flex, you'll also
need to enable the `SaaM\LoremIpsumBundle\SaaMLoremIpsumBundle`
in your `AppKernel.php` file.
## Usage
This bundle provides a single service for generating fake text, which
you can autowire by using the `SaaMIpsum` type-hint:
```php
// src/Controller/SomeController.php
use SaaM\LoremIpsumBundle\SaaMIpsum;
// ...
class SomeController
{
    public function index(SaaMIpsum $saaMIpsum)
    {
        $fakeText = $saaMIpsum->getParagraphs();
        // ...
    }
}
```
You can also access this service directly using the id
`saam_lorem_ipsum.saam_ipsum`.
## Configuration
A few parts of the generated text can be configured directly by
creating a new `config/packages/saam_lorem_ipsum.yaml` file. The
default values are:
```yaml
# config/packages/saam_lorem_ipsum.yaml
saam_lorem_ipsum:
    # Whether or not you think tacos are great
    tacos_are_great:    true
    # How much salsa do you want on you text?
    min_salsa:         3
```
## Extending the Word List
If you're feeling creative and excited, you can add 
your *own* words to the word generator!
To do that, create a class that implements `WordProviderInterface`:
```php
namespace App\Service;
use SaaM\LoremIpsumBundle\WordProviderInterface;
class CustomWordProvider implements WordProviderInterface
{
    public function getWordList(): array
    {
        return ['tequila'];
    }
}
```
And... that's it! If you're using the standard service configuration,
your new class will automatically be registered as a service and used
by the system. If you are not, you will need to register this class
as a service and tag it with `saam_ipsum_word_provider`.
## Contributing
Of course, open source is fueled by everyone's ability to give just a little bit
of their time for the greater good. If you'd like to see a feature or add some of
your *own* mexican words, awesome! You can request it - but creating a pull request
is an even better way to get things done.
Either way, please feel comfortable submitting issues or pull requests: all contributions
and questions are warmly appreciated.
