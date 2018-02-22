<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 18:02
 */

namespace Common;

// 遍历整个数据库表，拿到所有的对象
// 传统中要拿到所有的user 进行foreach逐条、个拿到数据
// 迭代器模式 可以把整个对数据库的操作都隐藏带一个类中
class AllUser implements \Iterator
{
    protected $ids;
    protected $data =[];
    protected $index;//迭代器的当前位置

    function __construct()
    {
        $db = Factory::getDataBase();
//        $db = Database::getInstance();
        $result = $db->query("select id from users");
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);

    }
    //Iterator迭代器的接口
    /**
     * 获取当前的一个元素
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $id = $this->ids[$this->index]['id'];
        return  Factory::getUser($id);

        // TODO: Implement current() method.
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->index++;
        // TODO: Implement next() method.
    }

    /**
     * 表示迭代器中的位置
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->index;
        // TODO: Implement key() method.
    }

    /**
     * 验证当前的元素是不是 最后一个元素
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->index < count($this->ids);
        // TODO: Implement valid() method.
    }

    /**
     * 重置整个迭代器 迭代到末尾后重新初始化回到整个集合开始
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->index = 0;
        // TODO: Implement rewind() method.
    }
}