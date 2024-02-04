package v1

import (
	"artofdev/internal/controller/http/dto"
	"artofdev/internal/domain/entity"
	book_usecase "artofdev/internal/domain/usecase/book"
	"context"
	"encoding/json"
	"github.com/julienschmidt/httprouter"
	"net/http"
)

const (
	bookURL  = "/books/:book_id"
	booksURL = "/books"
)

type BookUseCase interface {
	CreateBook(ctx context.Context, dto book_usecase.CreateBookDTO) (string, error)
	ListAllBooks(ctx context.Context) []entity.BookView
	ListFullBook(ctx context.Context, id string) entity.FullBook
}

type bookHandler struct {
	bookUsecase BookUseCase
}

func NewBoolHandler(bookUsecase BookUseCase) *bookHandler {
	return &bookHandler{bookUsecase: bookUsecase}
}

func (h *bookHandler) Register(router *httprouter.Router) {
	router.GET(booksURL, h.GetAllBooks)
}

func (h *bookHandler) GetAllBooks(w http.ResponseWriter, r *http.Request, params httprouter.Params) {
	//books := h.bookUsecase.ListAllBooks(r.Context())
	w.Write([]byte("Book"))
	w.WriteHeader(http.StatusOK)
}

func (h *bookHandler) CreateBook(w http.ResponseWriter, r *http.Request, params httprouter.Params) {
	var requestDTO dto.CreateBookDTO
	defer r.Body.Close()
	if err := json.NewDecoder(r.Body).Decode(&requestDTO); err != nil {
		return // error
	}

	usecaseDTO := book_usecase.CreateBookDTO{
		Name:     requestDTO.Name,
		Year:     requestDTO.Year,
		AuthorID: requestDTO.Author,
		GenreID:  requestDTO.Genre,
	}
	newBookID, err := h.bookUsecase.CreateBook(r.Context(), usecaseDTO)
	if err != nil {
		return // error
	}

	w.Write([]byte(newBookID))
	w.WriteHeader(http.StatusOK)
}
