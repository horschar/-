SELECT      sm.fio
FROM        sportsman sm
LEFT JOIN   result r on sm.id = r.sportsman
GROUP BY    sm.id
ORDER BY    COUNT(DISTINCT r.competition) desc
LIMIT       5