# Service layer(Repository)

Репозиторії не потрібні напряму доменним моделям. Вони потрібні саме доменним сервісам.

Тому 

- абстракція репозиторія - це **Domain Service layer**.
- реалізація репозиторія - окремий **Infrastructure layer** який знаходиться окремо від папки "Domain"

Кожен репозиторій відповідає за окрему Entity