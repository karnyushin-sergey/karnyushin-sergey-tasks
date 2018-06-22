<?php

/**
 * Проверяет состоят ли массивы arr1 и arr2 из одинакового
 * числа одних и тех же элементов
 *
 * @param array arr1 - отсортированный по возрастанию
 *                          массив уникальных элементов
 * @param array arr2 - массив произвольной длинны произвольных чисел
 * @return boolean
 */
function haveSameItems(array $arr1, array $arr2)
{
    return (count(array_diff($arr1, $arr2)) === 0) && (count(array_diff($arr2, $arr1)) === 0);
}
