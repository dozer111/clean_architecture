package service

import (
	"artofdev/internal/domain/entity"
	"context"
)

type BookStorage interface {
	GetOne(id string) entity.Book
	GetAll(ctx context.Context) []entity.Book
	Create(entity.Book) entity.Book
	Delete(entity.Book) error
}

type bookService struct {
	storage BookStorage
}

func NewBookService(storage BookStorage) *bookService {
	return &bookService{storage: storage}
}

func (s bookService) Create(ctx context.Context) entity.Book {
	return entity.Book{}
}

func (s bookService) GetByID(ctx context.Context, id string) entity.Book {
	return s.storage.GetOne(id)
}

func (s bookService) GetAll(ctx context.Context) []entity.Book {
	return s.storage.GetAll(ctx)
}

func (s bookService) GetAllForList(ctx context.Context) []entity.BookView {
	// TODO implement
	return nil
}
