<?php

/**
 * Создает матрицу размером n * n и заполняет ее по спирали
 *
 * @param int {Number} n - размерность матрицы
 * @return array {Number[n][n]} - n * n - матрица, заполненная по спирали
 */
function fillSpiralMatrix($n)
{
    $tableArray = [];

    // Этот костыль здесь для того, чтобы пройти некорректный тест
    // обеспечивается правильный порядок индексов
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $tableArray[$i][$j] = null;
        }
    }

    $directions = [
        ['x' => 0, 'y' => 1],
        ['x' => 1, 'y' => 0],
        ['x' => 0, 'y' => -1],
        ['x' => -1, 'y' => 0],
    ];
    $dirIndex = 0;
    $x = 0;
    $y = 0;
    for ($i = 1; $i <= $n * $n; $i++) {
        $tableArray[$x][$y] = $i;
        $nX = $x + $directions[$dirIndex]['x'];
        $nY = $y + $directions[$dirIndex]['y'];
        if (($nX > ($n - 1)) || ($nY > ($n - 1)) || ($nX < 0) || ($nY < 0) || isset($tableArray[$nX][$nY])) {
            $dirIndex = ($dirIndex === 3) ? 0 : ($dirIndex + 1);
        }
        $x = $x + $directions[$dirIndex]['x'];
        $y = $y + $directions[$dirIndex]['y'];
    }
    return $tableArray;
}
