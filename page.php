<?php
//    echo 'Это главный файл.<br/>';
//    require ('reusable.php');
//    echo 'Сейчас сценарий завершится.<br/>';
class Page
{
    public $content;
    public $title = "TLA Consulting Pty Ltd";
    public $keywords = "TLA consulting, Three Letter Abbreviation,
                        поисковые механизмы - наши лучшие друзья";
    public $buttons = array("Домой" => "home.php",
        "Контакт" => "contact.php",
        "Услуги" => "services.php",
        "Карта сайта" => "map.php"
    );

    /** @noinspection MagicMethodsValidityInspection */
    public function __set(string $name, $value): void
    {
        $this->$name = $value;
    }

    public function Display()
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo $this->content;
        $this->DisplayFooter();
        echo "</body>\n</html>";
    }

    public function DisplayTitle()
    {
        echo "<title>" . $this->title . "</title>";
    }

    public function DisplayKeywords()
    {
        echo "<meta> name='keywords' content='" . $this->keywords . "'/>";
    }

    public function DisplayStyles()
    {
        ?>
        <link rel="stylesheet" href="styles.css" type="text/css">
        <?php
    }

    public function DisplayHeader()
    {
        ?>
        <!-- верхний колонтикул страницы -->
        <header>
            <img src="#" alt="TLA logo" height="70" width="70">
            <h1>TLA Consulting</h1>
        </header>
        <?php
    }

    public function DisplayMenu($buttons)
    {
        echo "<!-- меню -->
        <nav>";
        while (list($name, $url) = each($buttons)) {
            $this->DisplayButton($name, $url,
                !$this->IsURLCurrentPage($url));
        }
        echo "</nav>\n";
    }

    public function IsURLCurrentPage($url)
    {
        if (strpos($_SERVER['PHP_SELF'], $url) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function DisplayButton($name, $url, $active = true)
    {
        if ($active) { ?>
            <div class="menuitem">
                <a href="<?= $url ?>">
                    <img src="#" alt="" height="20" width="20">
                    <span class="menutext"><?= $name ?></span>
                </a>
            </div>
            <?php
        } else { ?>
            <div class="menuitem">
                <img src="#">
                <span class="menutext"><?= $name ?></span>
            </div>
            <?php
        }
    }

    public function DisplayFooter()
    {
        ?>
        <!--нижний колонтикул страницы -->
        <footer>
            <p>&copy;TLA Consulting Pty Ltd.<br/>
                Пожалуйста, посмотрите нашу
                <a href="legal.php">страницу с юридической информацией</a>.</p>
        </footer>
        <?php
    }
}

?>