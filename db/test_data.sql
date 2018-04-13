USE cyg;
INSERT INTO mov_category (cat_id, cat_name) 
VALUES
(2, 'Drama'),
(3, 'Comedy'),
(4, 'Sci-Fi'),
(5, 'Horror'),
(6, 'Romance'),
(7, 'Action'),
(8, 'Mistery'),
(9, 'Crime'),
(10, 'Animation'),
(11, 'Fanstasy'),
(12, 'Superhero'),
(13, 'Sitcom'),
(14, 'Documental'),
(15, 'Reality show'),
(16, 'Cartoon'),
(17, 'Talk show');

INSERT INTO items
(
    item_id,
    item_title,
    item_category,
    item_year,
    item_info
)
VALUES
(
    1,
    'Star Wars',
    1,
    1977,
    'http://www.imdb.com/title/tt0076759/'
),
(
    2,
    'Kung Fu Panda',
    1,
    2008,
    'http://www.imdb.com/title/tt0441773/'
),
(
    3,
    'Avengers',
    1,
    2012,
    'http://www.imdb.com/title/tt0848228/'
),
(
    4,
    'Men in Black',
    1,
    1997,
    'http://www.imdb.com/title/tt0119654/'
),
(
    5,
    'Logan',
    1,
    2017,
    'http://www.imdb.com/title/tt3315342/'
),
(
    6,
    'The big bang theory',
    2,
    2007,
    'http://www.imdb.com/title/tt0898266/'
),
(
    7,
    'How I met your mother',
    2,
    2005,
    'http://www.imdb.com/title/tt0460649/'
),
(
    8,
    'This love',
    3,
    2003,
    'https://www.youtube.com/watch?v=XPpTgCho5ZA'
);


INSERT INTO movies (mov_id, mov_cat) 
VALUES
(
    1,
    4
),
(
    2,
    10
),
(
    3,
    12
),
(
    4,
    3
),
(
    5,
    12
),
(
    6,
    13
),
(
    7,
    13
);



INSERT INTO titles (item_id, lang, title)
VALUES
(
    1,
    2,
    'La guerra de las galaxias'
),
(
    3,
    2,
    'Los vengadores'
),
(
    4,
    2,
    'Hombres de negro'
),
(
    6,
    2,
    'La teoria del big bang'
),
(
    7,
    2,
    'Como conoci a su madre'
);
