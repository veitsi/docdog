<?php
//$input = file_get_contents("sample01.txt");
error_log($_POST['input']);
$input = $_POST['input'];
// разделитель предложений
$sep = '. ';

// разделитель для пакета вывода
$sip = "\n|{----------------------------------}|\n";

// --------------------------------------------------------------------------
// 1 - выдача результата для объекта
//if ($what == 1)
//{
// “площею __________ кв.м., що знаходиться за адресою __________” “адресою” “площею” “адреса” “площа”
$square = ["площею", "площа", "за адресою", "адреса", "адрес", "Адреса", "Поверх"];

// подсчёт кол-ва предложений
$howmany = substr_count($input, $sep);

// разбивка текста на предложения
$inputarray = explode($sep, $input);

// переменная для контроля отсутствия повторений
$temporoccur = 'none';

// переменная для выведения двух фрагментов адреса:
$additionalCounter = 1;

$target[0] = '';

for ($i = 0; $i <= $howmany; $i++) {
    for ($counter = 0; $counter <= 6; $counter++) {
        if (stristr($inputarray[$i], $square[$counter]) !== FALSE) {
            if ($temporoccur != $inputarray[$i]) {
                $target[0] .= $inputarray[$i] . '. ' . PHP_EOL;
                $additionalCounter = $additionalCounter + 1;
                if ($additionalCounter == 2) {
                    break 2;
                }
                $temporoccur = $inputarray[$i];
            }
        }
    }
}

//echo $target[0].$sip;
// 2 - выдача результата для цели
//if ($what == 2)
//{
// "з метою", "для того, щоб", “призначення”, “цільове”, “цільовому”, “змінювати”, “види діяльності”, “приміщення надається для” “мета оренди”
$aim = ["/з метою", "для того, щоб", "/призначення", "/цільове", "/цільовому", "надається для", "мета оренди", "для здійснення", "Орендарю для", "використання для", "з метою використання"];

// подсчёт кол-ва предложений
$howmany = substr_count($input, $sep);

// разбивка текста на предложения
$inputarray = explode($sep, $input);

// переменная для контроля отсутствия повторений
$temporoccur = 'none';

$target[1]='';

for ($i = 0; $i <= $howmany; $i++)
{
    for ($counter = 0; $counter <= 9; $counter++)
    {
        if (stristr($inputarray[$i], $aim[$counter]) !== FALSE)
        {
            if ($temporoccur != $inputarray[$i])
            {
                $target[1].= $inputarray[$i].'. '.PHP_EOL;
                $temporoccur = $inputarray[$i];
            }
        }
    }
}
//echo 'target[1]'. $sip;
//// --------------------------------------------------------------------------
//// 3 - выдача результата для цены
//// “Орендар сплачує” “Орендна плата сплачується” “Орендар зобов'язаний сплатити” “Орендар зобов'язується сплатити” “Орендар оплачує” “Орендар вносить орендну плату”
//// “Орендну плату”, “аванс”, “становить грн на місяць”, “складає грн на місяць”, “постоплата”, “оплата за найм”, “оплата” “за рахунок”, “у розмірі”, “перераховується не пізніше”
//// “збільшення орендної плати” “складає дол.”
$rent[0] = "/Орендар сплачує";
$rent[1] = "/орендар сплачує";
$rent[2] = "/Орендар оплачує";
$rent[3] = "/орендар оплачує";
$rent[4] = "Орендна плата";
$rent[5] = "Орендна плата";
$rent[6] = "Орендну плату";
$rent[7] = "Орендну плату";
$rent[8] = "/Орендар зобов'язаний сплатити";
$rent[9] = "/Орендар зобов'язаний сплатити";
$rent[10] = "/Орендар зобов'язується сплатити";
$rent[11] = "/Орендар зобов'язується сплатити";
$rent[12] = "Орендар вносить орендну плату";
$rent[13] = "Орендар вносить орендну плату";
$rent[14] = "грн на місяць";
$rent[15] = "грн. на місяць";
$rent[16] = "грн за місяць";
$rent[17] = "грн. за місяць";
$rent[18] = "грн в місяць";
$rent[19] = "грн. в місяць";
$rent[20] = "грн у місяць";
$rent[21] = "грн. у місяць";
$rent[22] = "Орендар оплачує";
$rent[23] = "Оплата цих послуг";
$rent[24] = "Вартість";

// подсчёт кол-ва предложений
$howmany = substr_count($input, $sep);

// разбивка текста на предложения
$inputarray = explode($sep, $input);

// переменная для контроля отсутствия повторений
$temporoccur = 'none';
$target[2]='';

for ($i = 0; $i <= $howmany; $i++)
{
    for ($counter = 0; $counter <= 24; $counter++)
    {
        if (stristr($inputarray[$i], $rent[$counter]) !== FALSE)
        {
            if ($temporoccur != $inputarray[$i])
            {
                $target[2].= $inputarray[$i].'. '.PHP_EOL;
                $temporoccur = $inputarray[$i];
            }
        }
    }
}
//}
//echo $target[2]. $sip;
//// --------------------------------------------------------------------------
// 4 - выдача результата для сроков
$timed[0] = "/рік";
$timed[1] = "/роки";
$timed[2] = "/року";
$timed[3] = "/місяць";
$timed[4] = "/місяці";
$timed[5] = "діє до";
$timed[6] = "Строк";
$timed[7] = "строк";

// подсчёт кол-ва предложений
$howmany = substr_count($input, $sep);

// разбивка текста на предложения
$inputarray = explode($sep, $input);

// переменная для контроля отсутствия повторений
$temporoccur = 'none';

$target[3]='';
for ($i = 0; $i <= $howmany; $i++)
{
    for ($counter = 0; $counter <= 7; $counter++)
    {
        if (stristr($inputarray[$i], $timed[$counter]) !== FALSE)
        {
            if ($temporoccur != $inputarray[$i])
            {
                $target[3].= $inputarray[$i].'. '.PHP_EOL;
                $temporoccur = $inputarray[$i];
            }
        }
    }
}
//}
//echo $target[3]. $sip;
//// --------------------------------------------------------------------------
// 5 - выдача результата для ответственности
$responsible[0] = "пеня";
$responsible[1] = "Пеня";
$responsible[2] = "пені";
$responsible[3] = "Пені";
$responsible[4] = "пеню";
$responsible[5] = "Пеню";
$responsible[6] = "несе відповідальн";
$responsible[7] = "штраф";

// подсчёт кол-ва предложений
$howmany = substr_count($input, $sep);

// разбивка текста на предложения
$inputarray = explode($sep, $input);

$target[4]='';

for ($i = 0; $i <= $howmany; $i++)
{
    for ($counter = 0; $counter <= 7; $counter++)
    {
        if (stristr($inputarray[$i], $responsible[$counter]) !== FALSE)
        {
            if ($temporoccur != $inputarray[$i])
            {
                $target[4].= $inputarray[$i].'. '.PHP_EOL;
                $temporoccur = $inputarray[$i];
            }
        }
    }
}

echo json_encode($target);