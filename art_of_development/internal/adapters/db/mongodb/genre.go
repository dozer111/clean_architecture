package mongodb

import (
	"artofdev/internal/domain/entity"
	"context"
	"go.mongodb.org/mongo-driver/mongo"
)

type genreStorage struct {
	db *mongo.Database
}

func NewGenreStorage(db *mongo.Database) *genreStorage {
	return &genreStorage{db: db}
}

func (s *genreStorage) GetOne(id string) entity.Genre {
	return entity.Genre{}
}

func (s *genreStorage) GetAll(ctx context.Context) []entity.Genre {
	return nil
}

func (s *genreStorage) Create(genre entity.Genre) entity.Genre {
	return entity.Genre{}
}

func (s *genreStorage) Delete(genre entity.Genre) error {
	return nil
}
