<?php

require_once 'env.php';
require_once 'db_connect.php';

$statement = "INSERT INTO albums (`artist`,`name`, `release_date`, `sales`, `genre`)
VALUES 
('Michael Jackson', 'Thriller', '1982', 46000000, 'Pop, rock, R&B'),
('AC/DC', 'Back in Black', '1980', 26100000, 'Hard rock'),
('Pink Floyd', 'The Dark Side of the Moon', '1973', 24200000, 'Progressive rock'),
('Whitney Houston / Various artists', 'The Bodyguard', '1992', 27400000, 'Soundtrack/R&B, soul, pop'),
('Meat Loaf', 'Bat Out of Hell', '1977', 20600000, 'Hard rock, progressive rock'),
('Eagles', 'Their Greatest Hits (1971–1975)', '1976', 32200000, 'Rock, soft rock, folk rock'),
('Bee Gees / Various artists', 'Saturday Night Fever', '1977', 20600000, 'Disco'),
('Fleetwood Mac', 'Rumours', '1977', 27900000, 'Soft rock'),
('Shania Twain', 'Come On Over', '1997', 29600000, 'Country, pop'),
('Led Zeppelin', 'Led Zeppelin IV', '1971', 29000000, 'Hard rock, heavy metal'),
('Michael Jackson', 'Bad', '1987', 20300000, 'Pop, funk, rock'),
('Alanis Morissette', 'Jagged Little Pill', '1995', 24800000, 'Alternative rock'),
('Celine Dion', 'Falling into You', '1996', 20200000, 'Pop, Soft rock'),
('The Beatles', 'Sgt. Peppers Lonely Hearts Club Band', '1967', 13100000, 'Rock'),
('Eagles', 'Hotel California', '1976', 21500000, 'Rock, soft rock, folk rock'),
('Mariah Carey', 'Music Box', '1993', 19000000, 'Pop, R&B, Rock'),
('Michael Jackson', 'Dangerous', '1991', 17600000, 'Rock, Funk, Pop'),
('Various artists', 'Dirty Dancing', '1987', 17900000, 'Pop, rock, R&B'),
('Celine Dion', 'Lets Talk About Love', '1997', 19300000, 'Pop, Soft rock'),
('The Beatles', '1', '2000', 21600000, 'Rock'),
('Adele', '21', '2011', 22300000, 'Pop, soul'),
('The Beatles', 'Abbey Road', '1969', 14400000, 'Rock'),
('Bruce Springsteen', 'Born in the U.S.A.', '1984', 19600000, 'Rock'),
('Dire Straits', 'Brothers in Arms', '1985', 17700000, 'Rock'),
('James Horner', 'Titanic: Music from the Motion Picture', '1997', 18100000, 'Soundtrack'),
('Madonna', 'The Immaculate Collection', '1990', 19400000, 'Pop, Dance'),
('Metallica', 'Metallica', '1991', 19900000, 'Thrash metal, heavy metal'),
('Nirvana', 'Nevermind', '1991', 16700000, 'Grunge, alternative rock'),
('Pink Floyd', 'The Wall', '1979', 17600000, 'Progressive rock'),
('Santana', 'Supernatural', '1999', 20500000, 'Rock'),
('Guns N Roses', 'Appetite for Destruction', '1987', 21300000, 'Heavy metal, hard rock');";

// exec method returns the number of rows affected
$rowsInserted = $dbc->exec($statement);

if($rowsInserted) {
    echo "$rowsInserted number of rows inserted..." . PHP_EOL;
} else {
    echo "nothing was entered into the db";
}