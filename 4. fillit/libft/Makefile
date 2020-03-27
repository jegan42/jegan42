# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/04/05 17:23:38 by jeagan            #+#    #+#              #
#    Updated: 2019/06/02 16:46:26 by jeagan           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# **************************************************************************** #
#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT
#                       __    ____  ____  ____  ____                           #
#                      (  )  (_  _)(  _ \( ___)(_  _)                          #
#                       )(__  _)(_  ) _ < )__)   )(                            #
#                      (____)(____)(____/(__)   (__)                           #
#                    ____  ____    __    ___    __    _  _                     #
#                   (_  _)( ___)  /__\  / __)  /__\  ( \( )                    #
#                  .-_)(   )__)  /(__)\( (_-. /(__)\  )  (                     #
#                  \____) (____)(__)(__)\___/(__)(__)(_)\_)                    #
#																			   #
#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT
# **************************************************************************** #

# **************************************************************************** #
# AUTEUR                                                                       #
# **************************************************************************** #

AUTEUR	=	echo "$(USER)" > auteur

# **************************************************************************** #
# PROGRAM                                                                      #
# **************************************************************************** #

NAME		=	libft.a
NAME_ONLY	=	$(basename $(NAME))

# **************************************************************************** #
# SOURCES                                                                      #
# **************************************************************************** #

SRC			=	ft_memset.c\
				ft_bzero.c\
				ft_memcpy.c\
				ft_memccpy.c\
				ft_memmove.c\
				ft_memchr.c\
				ft_memcmp.c\
				ft_strlen.c\
				ft_strdup.c\
				ft_strcpy.c\
				ft_strncpy.c\
				ft_strcat.c\
				ft_strncat.c\
				ft_strlcat.c\
				ft_strchr.c\
				ft_strrchr.c\
				ft_strstr.c\
				ft_strnstr.c\
				ft_strcmp.c\
				ft_strncmp.c\
				ft_atoi.c\
				ft_isalpha.c\
				ft_isdigit.c\
				ft_isalnum.c\
				ft_isascii.c\
				ft_isprint.c\
				ft_toupper.c\
				ft_tolower.c\
				\
				ft_memalloc.c\
				ft_memdel.c\
				ft_strnew.c\
				ft_strdel.c\
				ft_strclr.c\
				ft_striter.c\
				ft_striteri.c\
				ft_strmap.c\
				ft_strmapi.c\
				ft_strequ.c\
				ft_strnequ.c\
				ft_strsub.c\
				ft_strjoin.c\
				ft_strtrim.c\
				ft_strsplit.c\
				ft_itoa.c\
				ft_putchar.c\
				ft_putstr.c\
				ft_putendl.c\
				ft_putnbr.c\
				ft_putchar_fd.c\
				ft_putstr_fd.c\
				ft_putendl_fd.c\
				ft_putnbr_fd.c\
				\
				ft_lstnew.c\
				ft_lstdelone.c\
				ft_lstdel.c\
				ft_lstadd.c\
				ft_lstiter.c\
				ft_lstmap.c	\
				\
				ft_nbw.c\
				ft_dupw.c\
				ft_strndup.c
SRC_PATH	=	./
SRCS		=	$(addprefix $(SRC_PATH), $(SRC))

# **************************************************************************** #
# OBJECT                                                                       #
# **************************************************************************** #

OBJ			=	$(SRC:.c=.o)
OBJ_PATH	=	./
OBJS		=	$(addprefix $(OBJ_PATH), $(OBJ))
OBJS_DIRS	=	$(sort $(dir $(OBJS)))

# **************************************************************************** #
# INCLUDES                                                                     #
# **************************************************************************** #

INC_PATH	=	./
INCS_DIRS	=	$(addsuffix , $(INC_PATH))
INCS		=	$(addprefix -I , $(INCS_DIRS))

# **************************************************************************** #
# COLORS AND EFFECT                                                            #
# **************************************************************************** #

CE_NOCOLOR		=	\033[00m
CE_CLEAR		=	\033[2K
CE_UP 			=	\033[A
CE_BLACK		=	\033[30m
CE_RED			=	\033[31m
CE_GREEN		=	\033[32m
CE_YELLOW		=	\033[33m
CE_BLUE			=	\033[34m
CE_PURPLE		=	\033[35m
CE_CYAN			=	\033[36m
CE_WHITE		=	\033[37m
CE_SUR_BLACK	=	\033[40m
CE_SUR_RED		=	\033[41m
CE_SUR_GREEN	=	\033[42m
CE_SUR_YELLOW	=	\033[43m
CE_SUR_BLUE		=	\033[44m
CE_SUR_PURPLE	=	\033[45m
CE_SUR_CYAN		=	\033[46m
CE_SUR_WHITE	=	\033[47m
CE_GRAS			=	\033[1m
CE_SOUS			=	\033[4m

# **************************************************************************** #
# DBG MESSAGE                                                                  #
# **************************************************************************** #

MESS_ERROR		=	$(CE_RED)->ERROR<-$(CE_NOCOLOR)
MESS_WARNING	=	$(CE_YELLOW)->WARNING<-$(CE_NOCOLOR)
MESS_FAIL		=	$(CE_CYAN)->FAIL<-$(CE_NOCOLOR)
MESS_OK			=	$(CE_GREEN)... ->OK<-$(CE_NOCOLOR)
MESS_SUCCESS	=	$(CE_GREEN)->SUCCESS<-$(CE_NOCOLOR)
MESS_VALIDED	=	$(CE_GREEN)[ ✓ ]$(CE_NOCOLOR)
MESS_CURRENT	=	$(CE_CYAN)[ $@ ]$(CE_NOCOLOR)
MESS_COMPILED	=	$(CE_YELLOW)Compiled ==>>$(CE_NOCOLOR)
MESS_COMPIL		=	$(CE_YELLOW)-- Compiling$(CE_NOCOLOR)
MESS_ADD		=	$(CE_YELLOW)created ==>>$(CE_NOCOLOR)
MESS_DEL		=	$(CE_RED)==>> deleted$(CE_NOCOLOR)
MESS_NODEL		=	$(CE_CYAN)==>> nothing to delete$(CE_NOCOLOR)
MESS_NAME		=	$(CE_SUR_BLUE)$(CE_GRAS)$(CE_PURPLE)[ $(NAME_ONLY) ]$(CE_NOCOLOR)
MESS_ASSEMBLING	=	$(CE_GRAS)$(CE_YELLOW)Assembling ==>>$(CE_NOCOLOR)

# **************************************************************************** #
# PRINT                                                                        #
# **************************************************************************** #

ECHO_ASSEMBLING		=	$(MESS_NAME) $(MESS_ASSEMBLING) $(MESS_CURRENT) $(MESS_VALIDED)
ECHO_COMPILED		=	$(MESS_NAME) $(MESS_COMPILED) $(MESS_CURRENT) $(MESS_VALIDED)
ECHO_COMPIL			=	$(MESS_NAME) $(ACTUAL) / $(NBSRC) $(MESS_COMPIL) $(MESS_CURRENT) $(MESS_OK) $(CE_UP)	\
						$(eval ACTUAL=$(shell echo $$(($(ACTUAL) + 1))))
ECHO_OBJ_DIRECTORY	=	$(MESS_NAME) $(MESS_ADD) $(CE_BLUE)[ obj/ ] directory$(CE_NOCOLOR) $(MESS_SUCCESS)
ECHO_DELOBJ			=	$(MESS_NAME) $(CE_BLUE)[ OBJS.o ]$(CE_NOCOLOR) $(MESS_DEL) $(MESS_SUCCESS)
ECHO_NODELOBJ		=	$(MESS_NAME) $(CE_BLUE)[ OBJS.o ]$(CE_NOCOLOR) $(MESS_NODEL)
ECHO_DELALL			=	$(MESS_NAME) $(CE_CYAN)[ $(NAME) ]$(CE_NOCOLOR) $(MESS_DEL) $(MESS_SUCCESS)
ECHO_NODELALL		=	$(MESS_NAME) $(CE_CYAN)[ $(NAME) ]$(CE_NOCOLOR) $(MESS_NODEL)
ECHO_AUTEUR			=	$(CE_GREEN)=> AUTEUR CREATED <=$(CE_NOCOLOR)

# **************************************************************************** #
# VAR INT                                                                      #
# **************************************************************************** #

NBSRC	=	$(words $(SRC))
ACTUAL	=	1

# **************************************************************************** #
# COMPILATION & ORDER                                                          #
# **************************************************************************** #

CC		=	clang
CFLAGS	=	-Wall -Wextra -Werror
ECHO	=	echo "$(CE_CLEAR)"
ECHO_LOG=	$(ECHO)"$(CE_SUR_BLACK)$(CE_BLUE)$(CE_GRAS)"
MKDIR	=	mkdir -p
RM		=	rm -f
RMR		=	rm -R
AR		=	ar rc
AR_RAN	=	$(AR)us

# **************************************************************************** #
# RULES                                                                        #
# **************************************************************************** #

all: $(NAME)

$(NAME): $(OBJS)
	@$(AR_RAN) $(NAME) $(OBJS)
	@$(ECHO)"$(ECHO_COMPILED)"
	
auteur:
	@$(AUTEUR)
	@$(ECHO)"$(ECHO_AUTEUR)"

%.o: %.c libft.h
	@$(CC) $(CFLAGS) -o $@ -c $< $(INCLUDES)

clean:
ifneq ($(shell ls | grep ft_nbw.o), )
	@$(RMR) $(OBJS) 2> /dev/null || true
	@$(ECHO)"$(ECHO_DELOBJ)"
else
	@$(ECHO)"$(ECHO_NODELOBJ)"
endif

fclean: clean
ifneq ($(shell ls | grep libft.a), )
	@$(RM) $(NAME) 2> /dev/null || true
	@$(ECHO)"$(ECHO_DELALL)"
else
	@$(ECHO)"$(ECHO_NODELALL)"
endif

re: fclean all

# **************************************************************************** #
# PHONY                                                                        #
# **************************************************************************** #

.PHONY: all clean fclean re
