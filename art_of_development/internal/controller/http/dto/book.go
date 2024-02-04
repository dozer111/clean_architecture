package dto

type CreateBookDTO struct {
	Name   string `json:"name"`
	Year   int    `json:"year"`
	Author string `json:"author_id"`
	Genre  string `json:"genre_id"`
}
