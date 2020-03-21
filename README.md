## Installation

1. Go to your wordpress themes folder.
```
cd your.wordpress.directly/htdocs/wp-content/themes
```

1. Clone repository.
```
git clone https://github.com/KoheyAoyama/talent_doc.git
```

1. Install "Composer", PHP package tool.
[Composer](https://getcomposer.org/download/)
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

1. Install "Blade", wordpress tempalte engine for Laravel, and prepare some folder it needs.
```
composer require jenssegers/blade
mkdir cache
```

1. Install "Laravel Mix", development tool package.
```
npm init -y
npm i -D laravel-mix
```

### References
[Laravelエンジニアが考えたWordPressテーマ開発環境](https://www.hypertextcandy.com/wordpress-theme-development-for-laravel-develper)
