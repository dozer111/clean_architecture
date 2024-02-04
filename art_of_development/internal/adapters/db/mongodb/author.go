package mongodb

import (
	"artofdev/internal/domain/entity"
	"context"
	"go.mongodb.org/mongo-driver/mongo"
)

type authorStorage struct {
	db *mongo.Database
}

func NewAuthorStorage(db *mongo.Database) *authorStorage {
	return &authorStorage{db: db}
}

func (s *authorStorage) GetOne(id string) entity.Author {
	return entity.Author{}
}

func (s *authorStorage) GetAll(ctx context.Context) []entity.Author {
	return nil
}

func (s *authorStorage) Create(author entity.Author) entity.Author {
	return entity.Author{}
}

func (s *authorStorage) Delete(author entity.Author) error {
	return nil
}
