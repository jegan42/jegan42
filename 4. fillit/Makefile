# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/04/05 17:23:38 by jeagan            #+#    #+#              #
#    Updated: 2019/06/02 16:46:02 by jeagan           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# **************************************************************************** #
#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT
#                     ____  ____  __    __    ____  ____ 	  				   #
#                    ( ___)(_  _)(  )  (  )  (_  _)(_  _)	  				   #
#                     )__)  _)(_  )(__  )(__  _)(_   )(  	  				   #
#                    (__)  (____)(____)(____)(____) (__) 	  				   #
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

NAME		=	fillit
NAME_ONLY	=	$(basename $(NAME))

# **************************************************************************** #
# SOURCES                                                                      #
# **************************************************************************** #

FILES		=	main\
				check_file\
				solver
SRC			=	$(FILES:=.c)
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
# LIBFT                                                                        #
# **************************************************************************** #

LIBFT			=	libft.a
LIBFT_PATH		=	./libft
LIBFTS_DIRS		=	$(addsuffix /, $(LIBFT_PATH))
LIBFTS			=	$(addprefix $(LIBFTS_DIRS), $(LIBFT))

INCLIB_PATH		=	$(addsuffix , $(LIBFTS_DIRS))
INCLIBS_DIRS	=	$(addsuffix /, $(INCLIB_PATH))
INCLIBS			=	$(addprefix -I , $(INCLIBS_DIRS))

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
ECHO_LOG			=	$(CE_SUR_BLACK)$(CE_GREEN)$(CE_GRAS)
ECHO_LOG2			=	$(CE_SUR_BLACK)$(CE_BLUE)$(CE_GRAS)

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
MKDIR	=	mkdir -p
RM		=	rm -f
RMR		=	rm -R
AR		=	ar rc
AR_RAN	=	$(AR)us
LDFLAGS	=	$(addprefix -L, $(LIBFT_PATH))
LDLIBS	=	-lft


# **************************************************************************** #
# RULES                                                                        #
# **************************************************************************** #

all: auteur $(NAME)

$(NAME): $(OBJS) $(LIBFTS)
	@$(ECHO)"$(ECHO_LOG2)>>****************************************************************************<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                      ____  ____  __    __    ____  ____                    $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                     ( ___)(_  _)(  )  (  )  (_  _)(_  _)                   $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                      )__)  _)(_  )(__  )(__  _)(_   )(                     $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                     (__)  (____)(____)(____)(____) (__)                    $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                    ____  ____    __    ___    __    _  _                   $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                   (_  _)( ___)  /__\  / __)  /__\  ( \( )                  $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                  .-_)(   )__)  /(__)\( (_-. /(__)\  )  (                   $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                  \____) (____)(__)(__)\___/(__)(__)(_)\_)                  $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                                                                            $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_LOG2)>>****************************************************************************<<$(CE_NOCOLOR)"
	@$(ECHO)"$(ECHO_ASSEMBLING)"
	@$(CC) $(CFLAGS) $(LDFLAGS) $(LDLIBS) $^ -o $@ $(INCS) $(INCLIBS)
	@$(ECHO)"$(ECHO_COMPILED)"

auteur:
	@$(AUTEUR)
	@$(ECHO)"$(ECHO_AUTEUR)"

%.o: %.c fill_it.h
	@make -C $(LIBFTS_DIRS)
	@$(CC) $(CFLAGS) -c $< $(INCS) $(INCLIBS)

clean:
	@make clean -C $(LIBFTS_DIRS)
ifneq ($(shell ls -R | grep main.o), )
	@$(RMR) $(OBJS)
	@$(ECHO)"$(ECHO_DELOBJ)"
else
	@$(ECHO)"$(ECHO_NODELOBJ)"
endif

fclean:		clean
	@make fclean -C $(LIBFTS_DIRS)
ifneq ($(shell ls -R | grep fillit), )
	@$(RM) $(NAME)
	@$(ECHO)"$(ECHO_DELALL)"
else
	@$(ECHO)"$(ECHO_NODELALL)"
endif

re: fclean all

# **************************************************************************** #
# PHONY                                                                        #
# **************************************************************************** #

.PHONY: all clean fclean re
