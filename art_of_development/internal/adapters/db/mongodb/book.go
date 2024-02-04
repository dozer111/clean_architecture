package mongodb

import (
	"artofdev/internal/domain/entity"
	"context"
	"go.mongodb.org/mongo-driver/mongo"
)

type bookStorage struct {
	db *mongo.Database
}

func NewBookStorage(db *mongo.Database) *bookStorage {
	return &bookStorage{db: db}
}

func (s *bookStorage) GetOne(id string) entity.Book {
	return entity.Book{}
}

func (s *bookStorage) GetAll(ctx context.Context) []entity.Book {
	return nil
}

func (s *bookStorage) Create(book entity.Book) entity.Book {
	return entity.Book{}
}

func (s *bookStorage) Delete(book entity.Book) error {
	return nil
}
