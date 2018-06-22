<?php

class Emitter
{
    /**
     * @var array
     */
    private static $handlers = [];

    /**
     * Создает экземпляр класса Emitter.
     */
    public function constructor()
    {
    }

    /**
     * связывает обработчик с событием
     *
     * @param string event - событие
     * @param mixed handler - обработчик
     */
    public function on($event, $handler)
    {
        if (!isset(self::$handlers[$event])) {
            self::$handlers[$event] = [];
        }
        self::$handlers[$event][] = $handler;
    }

    /**
     * Генерирует событие -- вызывает все обработчики, связанные с событием и
     *                       передает им аргумент data
     *
     * @param string event
     * @param mixed data
     */
    public function emit($event, $data)
    {
        if (!isset(self::$handlers[$event])) {
            return;
        }
        foreach (self::$handlers[$event] as $handler) {
            $handler($data);
        }
    }
}
