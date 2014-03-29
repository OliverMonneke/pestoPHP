<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 29.03.2014
 * Time: 11:44
 */

namespace Codersquad\Pestophp\Tests\Request;


use Codersquad\Pestophp\Request\Post;
use PHPUnit_Framework_TestCase;

/**
 * Class PostTest
 * @package Codersquad\Pestophp\Tests\Request
 */
class PostTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testExecute()
    {
        $post = Post::getInstance();
        $post->execute();
        $this->assertEquals('xyz', Post::get('abc'));
        $this->assertEquals('uvw', Post::get('def'));
    }

    /**
     *
     */
    public function testHas()
    {
        $this->assertTrue(Post::has('abc'));
        $this->assertFalse(Post::has('xyz'));
    }

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $_POST['abc'] = 'xyz';
        $_POST['def'] = 'uvw';
    }
}
 