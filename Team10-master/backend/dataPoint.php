<?php
/*
 * dataPoint.php
 * Author: Team 10
 * This file produces the actual queries to execute
 */

class dataPoint
{

    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function betweenTimes($time1, $time2)
    {
        $query = '
			SELECT
				*
			FROM
				crime_instance
			WHERE
				crimetime BETWEEN ' . $time1 . ' AND ' . $time2 .
            ';';

        $prepare = $this->connection->prepare($query);
        $prepare->execute();
        return $prepare;
    }

    public function betweenBoth($time1, $time2, $date1, $date2)
    {
        $query = '
			SELECT
				*
			FROM
				crime_instance
			WHERE
				crimetime BETWEEN ' . $time1 . ' AND ' . $time2 .
            ' AND crimedate BETWEEN ' . $date1 . ' AND ' . $date2 .
            ';';

        $prepare = $this->connection->prepare($query);
        $prepare->execute();
        return $prepare;
    }

    public function betweenDates($date1, $date2)
    {
        $query = '
			SELECT
				*
			FROM
				crime_instance
			WHERE
				crimedate BETWEEN ' . $date1 . ' AND ' . $date2 .
            ';';

        $prepare = $this->connection->prepare($query);
        $prepare->execute();
        return $prepare;
    }
}