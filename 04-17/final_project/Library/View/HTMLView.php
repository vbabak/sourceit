<?php

namespace Library\View;


class HTMLView implements ViewInterface
{
    /** @var string View file path */
    protected $file_path = '';

    /** @var array View data */
    protected $data = [];

    public function __construct(string $file_path, array $data = [])
    {
        $this->file_path = $file_path;
        $this->data = $data;
    }

    public function __get(string $key)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : null;
    }

    public function setData(array $data = []): ViewInterface
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function renderPartial(string $file_path, array $data = []): string
    {
        $path = pathinfo($this->file_path, PATHINFO_DIRNAME) . DIRECTORY_SEPARATOR . $file_path;
        $view = new static($path, $data);

        return $view->render();
    }

    public function render(): string
    {
        extract($this->data);
        ob_start();
        include $this->file_path;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

}
