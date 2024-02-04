package entity

import "fmt"

type Book struct {
	ID       string `json:"id,omitempty"`
	Name     string `json:"name,omitempty"`
	Year     int    `json:"year,omitempty"`
	AuthorID string `json:"author_id,omitempty"`
	GenreID  string `json:"genre_id,omitempty"`
	Busy     bool   `json:"busy,omitempty"`
	Owner    string `json:"owner,omitempty"`
}

type BookView struct {
	ID         string `json:"id,omitempty"`
	Name       string `json:"name,omitempty"`
	Year       int    `json:"year,omitempty"`
	AuthorName string `json:"author_name,omitempty"`
	GenreName  string `json:"genre_name,omitempty"`
	Busy       bool   `json:"busy,omitempty"`
}

type FullBook struct {
	Book
	Author Author `json:"author,omitempty"`
	Genre  Genre  `json:"genre,omitempty"`
}

func (b *Book) Take(owner string) error {
	if b.Busy {
		return fmt.Errorf("book is busy")
	}

	b.Owner = owner
	b.Busy = true

	return nil
}
