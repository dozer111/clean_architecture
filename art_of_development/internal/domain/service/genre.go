package service

import (
	"artofdev/internal/domain/entity"
	"context"
)

type GenreStorage interface {
	GetOne(id string) entity.Genre
	GetAll(ctx context.Context) []entity.Genre
	Create(entity.Genre) entity.Genre
	Delete(entity.Genre) error
}

type genreService struct {
	storage GenreStorage
}

func NewGenreService(storage GenreStorage) *genreService {
	return &genreService{storage: storage}
}

func (s genreService) Create(ctx context.Context) entity.Genre {
	return entity.Genre{}
}

func (s genreService) GetByID(ctx context.Context, id string) entity.Genre {
	return s.storage.GetOne(id)
}

func (s genreService) GetAll(ctx context.Context) []entity.Genre {
	return s.storage.GetAll(ctx)
}
