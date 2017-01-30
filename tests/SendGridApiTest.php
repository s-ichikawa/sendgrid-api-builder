<?php
use Sichikawa\SendgridApiBuilder\SendGridApi;

/**
 * Created by PhpStorm.
 * User: ichikawashingo
 * Date: 2017/01/28
 * Time: 18:49
 */
class SendGridApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SendGridApi
     */
    private $mock;

    protected function setUp()
    {
        parent::setUp();
        $this->mock = $this->getMockForTrait(SendGridApi::class);
    }

    public function testSgParams()
    {
        $params = [
            'personalizations' => [
                [
                    'substitutions' => [
                        ':myname' => 's-ichikawa',
                    ],
                ],
            ],
        ];
        $this->mock->setSgParams($params);

        $this->assertEquals($params, $this->mock->getSgParams());
    }


    public function testCleanParams()
    {
        $params = [
            'personalizations' => [
                [
                    'to'            => [
                        [
                            'email' => 'to1@sink.sendgrid.net',
                            'name'  => 'to-name',
                        ],
                        new \Sichikawa\SendgridApiBuilder\Api\Personalize\To('to2@sink.sendgrid.net'),
                    ],
                    'substitutions' => [
                        ':myname' => 's-ichikawa',
                    ],
                ],
            ],
        ];

        $this->assertEquals([
            'personalizations' => [
                [
                    'to'            => [
                        [
                            'email' => 'to1@sink.sendgrid.net',
                            'name'  => 'to-name',
                        ],
                        [
                            'email' => 'to2@sink.sendgrid.net',
                        ],
                    ],
                    'substitutions' => [
                        ':myname' => 's-ichikawa',
                    ],
                ],
            ],
        ], $this->mock->cleanParams($params));
    }

    public function testSetPersonalizations()
    {
        $personalize = new \Sichikawa\SendgridApiBuilder\Api\Personalize();
        $personalize
            ->addTo('to@sink.sendgrid.net');
        $this->mock->setPersonalizations([$personalize]);

        $this->assertEquals([
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => 'to@sink.sendgrid.net',
                        ],
                    ],
                ],
            ],
        ], $this->mock->getSgParams());
    }

    public function testAddPersonalizations()
    {
        $personalize = new \Sichikawa\SendgridApiBuilder\Api\Personalize();
        $personalize
            ->addTo('to@sink.sendgrid.net');
        $this->mock->addPersonalizations($personalize);

        $this->assertEquals([
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => 'to@sink.sendgrid.net',
                        ],
                    ],
                ],
            ],
        ], $this->mock->getSgParams());
    }

    /**
     * @dataProvider dataTestSetFrom
     */
    public function testSetFrom($email, $name, $expected)
    {
        $this->mock->setFrom($email, $name);
        $this->assertEquals($expected, $this->mock->getSgParams());
    }

    public function dataTestSetFrom()
    {
        return [
            ['test@sink.sendgrid.net', null, ['from' => ['email' => 'test@sink.sendgrid.net']]],
            ['test@sink.sendgrid.net', 'test', ['from' => ['email' => 'test@sink.sendgrid.net', 'name' => 'test']]],
            [new \Sichikawa\SendgridApiBuilder\Api\From('test@sink.sendgrid.net', 'test'), null, ['from' => ['email' => 'test@sink.sendgrid.net', 'name' => 'test']]],
        ];
    }

    /**
     * @dataProvider dataTestSetReplyTo
     */
    public function testSetReplyTo($email, $name, $expected)
    {
        $this->mock->setReplyTo($email, $name);
        $this->assertEquals($expected, $this->mock->getSgParams());
    }

    public function dataTestSetReplyTo()
    {
        return [
            ['test@sink.sendgrid.net', null, ['reply_to' => ['email' => 'test@sink.sendgrid.net']]],
            ['test@sink.sendgrid.net', 'test', ['reply_to' => ['email' => 'test@sink.sendgrid.net', 'name' => 'test']]],
            [new \Sichikawa\SendgridApiBuilder\Api\ReplyTo('test@sink.sendgrid.net', 'test'), null, ['reply_to' => ['email' => 'test@sink.sendgrid.net', 'name' => 'test']]],
        ];
    }

    public function testSetSubject()
    {
        $this->mock->setSubject('test subject');
        $this->assertEquals([
            'subject' => 'test subject',
        ], $this->mock->getSgParams());
    }

    public function testSetContent()
    {
        $this->mock->setContent([
            ['type' => 'text/plain', 'value' => 'text content'],
            new \Sichikawa\SendgridApiBuilder\Api\Content('text/html', 'html content')
        ]);
        $this->assertEquals([
            'content' => [
                ['type' => 'text/plain', 'value' => 'text content'],
                ['type' => 'text/html', 'value' => 'html content'],
            ],
        ], $this->mock->getSgParams());
    }

    /**
     * @param $content
     * @param $type
     * @param $expected
     * @dataProvider dataTestSetContent
     */
    public function testAddContent($content, $type, $expected)
    {
        $this->mock->addContent($content, $type);
        $this->assertEquals($expected, $this->mock->getSgParams());
    }

    public function dataTestSetContent()
    {
        return [
            ['text/plain', 'text', ['content' => [['type' => 'text/plain', 'value' => 'text']]]],
            [new \Sichikawa\SendgridApiBuilder\Api\Content('text/html', 'text'), null, ['content' => [['type' => 'text/html', 'value' => 'text']]]],
        ];
    }

    public function testSetTemplateId()
    {
        $this->mock->setTemplateId('abc-1234');
        $this->assertEquals([
            'template_id' => 'abc-1234',
        ], $this->mock->getSgParams());
    }
}