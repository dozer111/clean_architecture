package book_usecase

import (
	"artofdev/internal/domain/entity"
	"context"
)

type Service interface {
	GetAllForList(ctx context.Context) []entity.BookView
	GetByID(ctx context.Context, id string) entity.Book
}

type AuthorService interface {
	GetByID(ctx context.Context, id string) entity.Author
}

type GenreService interface {
	GetByID(ctx context.Context, id string) entity.Genre
}

type bookUsecase struct {
	bookService   Service
	authorService AuthorService
	genreService  GenreService
}

func (u bookUsecase) CreateBook(ctx context.Context, dto CreateBookDTO) (string, error) {
	return "", nil
}

// ListAllBooks вивести
// список книжок
// з автором
// і жанром
func (u bookUsecase) ListAllBooks(ctx context.Context) []entity.BookView {
	return u.bookService.GetAllForList(ctx)
}

// ListFullBook видати повноцінну книжку з усіма даними
func (u bookUsecase) ListFullBook(ctx context.Context, id string) entity.FullBook {
	book := u.bookService.GetByID(ctx, id)
	author := u.authorService.GetByID(ctx, book.AuthorID)
	genre := u.genreService.GetByID(ctx, book.GenreID)

	return entity.FullBook{
		Book:   book,
		Author: author,
		Genre:  genre,
	}
}
