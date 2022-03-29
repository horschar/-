CREATE TABLE `sportsman` (
     `id` int(11) NOT NULL,
     `fio` varchar(64) NOT NULL,
     `email` varchar(64) DEFAULT NULL,
     `telephone` varchar(20) DEFAULT NULL,
     `birthday` date NOT NULL,
     `age` tinyint(4) NOT NULL,
     `dcreate` datetime NOT NULL,
     `passport` varchar(11) NOT NULL,
     `avgplace` float DEFAULT NULL,
     `biography` text DEFAULT NULL,
     `videopresentation` text DEFAULT NULL
)