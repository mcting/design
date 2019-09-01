<?php


namespace MCTing\Design\Adapter;

class EBookAdapter implements PaperBookInterface
{
    protected $eBook;

    /**
     * 注意该构造函数注入了电子书接口EBookInterface
     * @param EBookInterface $eBook
     */
    public function __construct(EBookInterface $eBook)
    {
        $this->eBook = $eBook;
    }

    public function open()
    {
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        $this->eBook->pressNext();
    }

    /**
     * 注意这里适配器的行为： EBookInterface::getPage() 将返回两个整型，除了 BookInterface
     * 仅支持获得当前页，所以我们这里适配这个行为
     * @return int
     */
    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }
}