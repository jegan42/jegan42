# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: jeagan <marvin@42.fr>                      +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/04/02 15:48:42 by jeagan            #+#    #+#              #
#    Updated: 2019/04/02 15:48:46 by jeagan           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = ft_display_file
SRCS = ft_display_file.c
SRCDIR = ./srcs/
OBJ= $(SRCS:.c=.o)
SRCSDIR = $(addprefix $(SRCDIR), $(SRCS))
INCLUDES= -I ./inc/
CFLAGS = -c -Wall -Wextra -Werror

all: $(NAME)

$(NAME): $(OBJ)
		@gcc -o $@ $(OBJ)

$(OBJ): $(SRCSDIR)
	@gcc $(CFLAGS) $^ $(INCLUDES)

clean:
	@rm -f $(OBJ)

fclean: clean
	@rm -f $(NAME)

re: fclean all

.phony: $(NAME) fclean clean re all
