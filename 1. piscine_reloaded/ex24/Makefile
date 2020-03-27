# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: jeagan <marvin@42.fr>                      +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/04/02 13:46:47 by jeagan            #+#    #+#              #
#    Updated: 2019/04/02 13:46:49 by jeagan           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = libft.a
SRCS = ft_putchar.c ft_putstr.c ft_strcmp.c ft_strlen.c ft_swap.c
SRCDIR = ./srcs/
OBJ= $(SRCS:.c=.o)
SRCSDIR = $(addprefix $(SRCDIR), $(SRCS))
INCLUDES= includes

all: $(NAME)

$(NAME) :
	gcc -I $(INCLUDES) -c $(SRCSDIR)
	ar rc $(NAME) $(OBJ)
	ranlib $(NAME)

clean:
	/bin/rm -f $(OBJ)

fclean: clean
	/bin/rm -f $(NAME)

re: fclean all

.phony: $(NAME) fclean clean re all
